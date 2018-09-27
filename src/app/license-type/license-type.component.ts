import { Component, OnInit } from '@angular/core';
import { Globals } from '.././globals';
import { LicenceTypeService } from '../services/licence-type.service';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CommonService } from '../services/common.service';
declare var $,swal: any;
declare function myInput(): any;

@Component({
  selector: 'app-license-type',
  templateUrl: './license-type.component.html',
  styleUrls: ['./license-type.component.css']
})
export class LicenseTypeComponent implements OnInit {
	LicenceTypeEntity;
	submitted;
	btn_disable;
	header;

	constructor(public globals: Globals, private router: Router,
		private LicenceTypeService: LicenceTypeService, private route: ActivatedRoute, private CommonService: CommonService) { }

	ngOnInit() {
		this.globals.pageTitle = '- License Pack Type';
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
			this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Licence-type'})
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
		this.LicenceTypeEntity = {};
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.header = 'Edit';
			this.LicenceTypeService.getById(id)
				.then((data) => {
					this.LicenceTypeEntity = data;
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
			this.LicenceTypeEntity = {};
			this.LicenceTypeEntity.ConfigurationId = 0;
			this.LicenceTypeEntity.IsActive = '1';
			this.globals.isLoading = false;
			myInput();
		}
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".lpacktype").parent().addClass("in");
			$(".settings").addClass("active"); 
			$(".lpacktype").addClass("active");
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
			}      
			else{  
				$('footer').removeClass('footer_fixed');    
			}
		},500);
	}

	addLicenceType(LicenceTypeForm) {
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.LicenceTypeEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {
			this.LicenceTypeEntity.CreatedBy = this.globals.authData.UserId;
			this.LicenceTypeEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = true;
		}
		if (LicenceTypeForm.valid) {
			this.btn_disable = true;
			this.LicenceTypeService.add(this.LicenceTypeEntity)
				.then((data) => {
					this.btn_disable = false;
					this.submitted = false;
					this.LicenceTypeEntity = {};
					LicenceTypeForm.form.markAsPristine();
					if (id) {
						
						swal({
							position: 'top-end',
							type: 'success',
							title: 'License Pack Type updated successfully',
							showConfirmButton: false,
							timer: 1500
						})
					} else {
						swal({
							position: 'top-end',
							type: 'success',
							title: 'License Pack Type added successfully',
							showConfirmButton: false,
							timer: 1500
						})
					}
					this.router.navigate(['/license-type/list']);
				},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.router.navigate(['/pagenotfound']);
				});
		}
	}

	clearForm(LicenceTypeForm) {
		this.LicenceTypeEntity = {};
		this.LicenceTypeEntity.ConfigurationId = 0;
		this.LicenceTypeEntity.IsActive = '1';
		this.submitted = false;
		LicenceTypeForm.form.markAsPristine();
	}

}


