import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { DiscountService } from '../services/discount.service';
import { Globals } from '../globals';
import { CommonService } from '../services/common.service';
declare var $,swal: any;
declare function myInput(): any;

@Component({
  selector: 'app-discount',
  templateUrl: './discount.component.html',
  styleUrls: ['./discount.component.css']
})
export class DiscountComponent implements OnInit {
	DiscountTypeList;
	DiscountEntity;
	header;
	btn_disable;
	submitted;

	constructor(private router: Router, private route: ActivatedRoute,
		private DiscountService: DiscountService, public globals: Globals, private CommonService: CommonService) { }

	ngOnInit() {
		this.globals.pageTitle = '- Discount';
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
			this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Discount'})
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
		this.DiscountService.getAllDiscountType()
		.then((data) => {
			this.DiscountTypeList = data;
			this.globals.isLoading = false;	
		},
		(error) => {
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);
		});

		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.header = 'Edit';
			this.DiscountService.getById(id)
				.then((data) => {
					this.DiscountEntity = data;
					this.globals.isLoading = false;	
					setTimeout(function(){
						myInput();
				  },100); 
				},
				(error) => {
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
		}
		else {
			this.header = 'Add';
			this.DiscountEntity = {};
			this.DiscountEntity.DiscountId = 0;
			this.DiscountEntity.IsActive = '1';
			this.DiscountEntity.DiscountType='';
			myInput();
		}
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".discount").parent().addClass("in");
			$(".managelicense").addClass("active"); 
			$(".discount").addClass("active");	
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}
		},500);
	}

	addDiscount(DiscountForm) {		
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.DiscountEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {
			this.DiscountEntity.CreatedBy = this.globals.authData.UserId;
			this.DiscountEntity.UpdatedBy = this.globals.authData.UserId;
			this.DiscountEntity.DiscountId = 0;
			this.submitted = true;
		}
		if (DiscountForm.valid) {
			
			this.btn_disable = true;
			this.DiscountService.add(this.DiscountEntity)
				.then((data) => {
					this.btn_disable = false;
					this.submitted = false;
					this.DiscountEntity = {};
					DiscountForm.form.markAsPristine();
					if (id) {
						// this.globals.message = 'Discount updated successfully';
						// this.globals.type = 'success';
						// this.globals.msgflag = true;
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Discount updated successfully',
							showConfirmButton: false,
							timer: 1500
						})
					} else {
						// this.globals.message = 'Discount added successfully';
						// this.globals.type = 'success';
						// this.globals.msgflag = true;
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Discount added successfully',
							showConfirmButton: false,
							timer: 1500
						})
					}
					this.router.navigate(['/discount/list']);
				},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
		}
	}

	clearForm(DiscountForm) {
		this.DiscountEntity = {};
		this.DiscountEntity.DiscountId = 0;
		this.DiscountEntity.IsActive = '1';
		this.DiscountEntity.DiscountType='';
		this.submitted = false;
		DiscountForm.form.markAsPristine();
	}

}

