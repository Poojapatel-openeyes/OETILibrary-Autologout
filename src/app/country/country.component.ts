import { Component, OnInit } from '@angular/core';
import { Globals } from '.././globals';
import { CountryService } from '../services/country.service';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CommonService } from '../services/common.service';
declare var $,swal: any;
declare function myInput(): any;

@Component({
	selector: 'app-country',
	templateUrl: './country.component.html',
	styleUrls: ['./country.component.css']
})
export class CountryComponent implements OnInit {
	CountryEntity;
	submitted;
	btn_disable;
	header;

	constructor(public globals: Globals, private router: Router,
		private CountryService: CountryService, private route: ActivatedRoute, private CommonService: CommonService) { }

	ngOnInit() {
		this.globals.pageTitle = '- Country';
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
			this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Country'})
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
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".country").parent().addClass("in");
			$(".settings").addClass("active"); 
			$(".country").addClass("active");
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}		       		
		},500);
	}

	default(){
		this.globals.msgflag = false;
		this.CountryEntity = {};
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.header = 'Edit';
			this.CountryService.getById(id)
				.then((data) => {
					this.CountryEntity = data;
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
			this.CountryEntity = {};
			this.CountryEntity.CountryId = 0;
			this.CountryEntity.IsActive = '1';
			this.globals.isLoading = false;
			myInput();	
		}
	}

	addCountry(CountryForm) {
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.CountryEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {
			this.CountryEntity.CreatedBy = this.globals.authData.UserId;
			this.CountryEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = true;
		}
		if (CountryForm.valid) {
			this.btn_disable = true;
			this.CountryService.add(this.CountryEntity)
				.then((data) => {
					this.btn_disable = false;
					this.submitted = false;
					this.CountryEntity = {};
					CountryForm.form.markAsPristine();
					if (id) {
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Country updated successfully',
							showConfirmButton: false,
							timer: 1500
						})
					} else {
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Country added successfully',
							showConfirmButton: false,
							timer: 1500
						})
					}
					this.router.navigate(['/country/list']);
				},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.router.navigate(['/pagenotfound']);
				});
		}
	}

	clearForm(CountryForm) {
		this.CountryEntity = {};
		this.CountryEntity.CountryId = 0;
		this.CountryEntity.IsActive = '1';
		this.submitted = false;
		CountryForm.form.markAsPristine();
	}

}
