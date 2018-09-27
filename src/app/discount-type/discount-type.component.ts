import { Component, OnInit } from '@angular/core';
import { Globals } from '.././globals';
import { DiscountTypeService } from '../services/discount-type.service';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CommonService } from '../services/common.service';
declare var $,swal: any;
declare function myInput(): any;

@Component({
	selector: 'app-discount-type',
  templateUrl: './discount-type.component.html',
  styleUrls: ['./discount-type.component.css']
})
export class DiscountTypeComponent implements OnInit {
	DiscountTypeEntity;
	submitted;
	btn_disable;
	header;

	constructor(public globals: Globals, private router: Router,
		private DiscountTypeService: DiscountTypeService, private route: ActivatedRoute, private CommonService: CommonService) { }

	ngOnInit() {
		this.globals.pageTitle = '- Discount Type';
		$("footer").addClass("footer_admin");
		if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
			$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
		} else {
			$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
		}
		this.globals.isLoading = true;
		if(this.globals.authData.RoleId==5){		
			this.default();
		} else {
			this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Discount-type'})
			.then((data) => 
			{
				if(data['AddEdit']==1){
					this.default();
				} else {
					this.router.navigate(['/pagenotfound']);
				}
			},
			(error) => 
			{
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});	
		}
	}

	default(){
		this.globals.msgflag = false;
		this.DiscountTypeEntity = {};
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.header = 'Edit';
			this.DiscountTypeService.getById(id)
				.then((data) => {
					this.DiscountTypeEntity = data;
					this.globals.isLoading = false;
					setTimeout(function(){
						myInput();
				  },100); 
				},
				(error) => {
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
		} else {
			this.header = 'Add';
			this.DiscountTypeEntity = {};
			this.DiscountTypeEntity.ConfigurationId = 0;
			this.DiscountTypeEntity.IsActive = '1';
			this.globals.isLoading = false;
			myInput();	
		}
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".discounttype").parent().addClass("in");
			$(".settings").addClass("active"); 
			$(".discounttype").addClass("active");
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}
		},500);
	}

	addDiscountType(DiscountTypeForm) {
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.DiscountTypeEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {
			this.DiscountTypeEntity.CreatedBy = this.globals.authData.UserId;
			this.DiscountTypeEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = true;
		}
		if (DiscountTypeForm.valid) {
			this.btn_disable = true;
			this.DiscountTypeService.add(this.DiscountTypeEntity)
				.then((data) => {
					this.btn_disable = false;
					this.submitted = false;
					this.DiscountTypeEntity = {};
					DiscountTypeForm.form.markAsPristine();
					if (id) {
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Discount Type updated successfully',
							showConfirmButton: false,
							timer: 1500
						})
					} else {
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Discount Type added successfully',
							showConfirmButton: false,
							timer: 1500
						})
					}
					this.router.navigate(['/discount-type/list']);
				},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.router.navigate(['/pagenotfound']);
				});
		}
	}

	clearForm(DiscountTypeForm) {
		this.DiscountTypeEntity = {};
		this.DiscountTypeEntity.ConfigurationId = 0;
		this.DiscountTypeEntity.IsActive = '1';
		this.submitted = false;
		DiscountTypeForm.form.markAsPristine();
	}

}

