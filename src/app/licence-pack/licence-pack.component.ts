import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { LicencePackService } from '../services/licence-pack.service';
import { Globals } from '../globals';
import { CommonService } from '../services/common.service';
declare var $,swal: any;
declare function myInput(): any;

@Component({
  selector: 'app-licence-pack',
  templateUrl: './licence-pack.component.html',
  styleUrls: ['./licence-pack.component.css']
})
export class LicencePackComponent implements OnInit {
	DiscountList;
	LicenceTypeList;
	LicensePackEntity;
	header;
	btn_disable;
	submitted;
	StartDateValid;
	EndDateValid;

	constructor(private router: Router, private route: ActivatedRoute,
		private LicencePackService: LicencePackService, public globals: Globals, private CommonService: CommonService) { }

	ngOnInit() {
		this.globals.pageTitle = '- License Pack';
	$("footer").addClass("footer_admin");

	if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
		$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
	} else {
	$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
  }

    this.LicensePackEntity = {};
		this.globals.isLoading = true;	
		if(this.globals.authData.RoleId==5){		
			this.default();
		} else {
			this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Licence-pack'})
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
		this.LicencePackService.getAllData()
		.then((data) => {
      this.DiscountList = data['discount'];
      this.LicenceTypeList = data['licencetype'];
			this.globals.isLoading = false;	
		},
		(error) => {
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);
		});
		
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.header = 'Edit';
			this.LicencePackService.getById(id)
				.then((data) => {
					this.LicensePackEntity = data;
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
			this.LicensePackEntity = {};
			this.LicensePackEntity.LicensePackId = 0;
			this.LicensePackEntity.IsActive = '1';
      this.LicensePackEntity.LicensePackType='';
	  this.LicensePackEntity.DiscountId='0';
	 
		}

		
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".licensepack").parent().addClass("in");
			$(".managelicense").addClass("active"); 
			$(".licensepack").addClass("active");	
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
			}      
			else{  
				$('footer').removeClass('footer_fixed');    
			}
			$('.form_date').datetimepicker({
				startDate : new Date(),
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2
			});
			myInput();
		},500);
	}

	changeDiscount(){
		setTimeout(function(){
			
			$('.form_date').datetimepicker({
				startDate : new Date(),
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2
			});
			myInput();
		},500);
	}

	addLicensePack(LicensePackForm) {	debugger
		this.LicensePackEntity.StartDate = $("#StartDate").val();	
			this.LicensePackEntity.EndDate = $("#EndDate").val();
			if(this.LicensePackEntity.DiscountId>0){
				if(this.LicensePackEntity.StartDate==""){
					this.StartDateValid = true;
				} else {
					this.StartDateValid = false;
				}
				if(this.LicensePackEntity.EndDate==""){
					this.EndDateValid = true;
				} else {
					this.EndDateValid = false;
				}
			}
		// if(this.LicensePackEntity.DiscountId>0 && this.LicensePackEntity.StartDate!="" && this.LicensePackEntity.EndDate){
		// 	this.StartDateValid = false;
		// 	this.EndDateValid = false;
		// } 
		
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.LicensePackEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {
			this.LicensePackEntity.CreatedBy = this.globals.authData.UserId;
			this.LicensePackEntity.UpdatedBy = this.globals.authData.UserId;
			this.LicensePackEntity.LicensePackId = 0;
			this.submitted = true;
		}
		if (LicensePackForm.valid && (this.LicensePackEntity.DiscountId==0 || (this.LicensePackEntity.DiscountId>0 && this.LicensePackEntity.StartDate!="" && this.LicensePackEntity.EndDate))) {

			
			
			this.btn_disable = true;
			this.LicencePackService.add(this.LicensePackEntity)
				.then((data) => {
					this.btn_disable = false;
					this.submitted = false;
					this.LicensePackEntity = {};
					LicensePackForm.form.markAsPristine();
					if (id) {
						swal({
							position: 'top-end',
							type: 'success',
							title: 'License Pack updated successfully',
							showConfirmButton: false,
							timer: 1500
						})
					} else {
						swal({
							position: 'top-end',
							type: 'success',
							title: 'License Pack added successfully',
							showConfirmButton: false,
							timer: 1500
						})
					}
					this.router.navigate(['/license-pack/list']);
				},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
		}
	}

	clearForm(LicensePackForm) {
		this.LicensePackEntity = {};
		this.LicensePackEntity.LicensePackId = 0;
		this.LicensePackEntity.IsActive = '1';
		this.LicensePackEntity.DiscountType='';
		this.LicensePackEntity.DiscountId='0';
		this.submitted = false;
		LicensePackForm.form.markAsPristine();
	}

}


