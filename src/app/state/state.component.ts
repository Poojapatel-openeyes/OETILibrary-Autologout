import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { StateService } from '../services/state.service';
import { Globals } from '../globals';
import { CommonService } from '../services/common.service';
declare var $,swal: any;
declare function myInput(): any;

@Component({
	selector: 'app-state',
	templateUrl: './state.component.html',
	styleUrls: ['./state.component.css']
})
export class StateComponent implements OnInit {
	CountryEntity;
	CountryList;
	stateEntity;
	header;
	btn_disable;
	submitted;

	constructor(private router: Router, private route: ActivatedRoute,
		private StateService: StateService, public globals: Globals, private CommonService: CommonService) { }

	ngOnInit() {
		this.globals.pageTitle = '- State';
		if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
			$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
		} else {
		$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
	  }
		$("footer").addClass("footer_admin");
		this.globals.isLoading = true;	
		if(this.globals.authData.RoleId==5){		
			this.default();
		} else {
			this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'State'})
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
		this.StateService.getAllCountry()
		.then((data) => {
			this.CountryList = data;
			this.globals.isLoading = false;	
		},
		(error) => {
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);
		});

		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.header = 'Edit';
			this.StateService.getById(id)
				.then((data) => {
					this.stateEntity = data;
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
			this.stateEntity = {};
			this.stateEntity.StateId = 0;
			this.stateEntity.IsActive = '1';
			this.stateEntity.CountryId='';
			myInput();
		}
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".state").parent().addClass("in");
			$(".settings").addClass("active"); 
			$(".state").addClass("active");	
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
			}      
			else{  
				$('footer').removeClass('footer_fixed');    
			}       		
		},500);
	}

	addState(stateForm) {		
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.stateEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {
			this.stateEntity.CreatedBy = this.globals.authData.UserId;
			this.stateEntity.UpdatedBy = this.globals.authData.UserId;
			this.stateEntity.StateId = 0;
			this.submitted = true;
		}
		if (stateForm.valid) {
			
			this.btn_disable = true;
			this.StateService.add(this.stateEntity)
				.then((data) => {
					this.btn_disable = false;
					this.submitted = false;
					this.stateEntity = {};
					stateForm.form.markAsPristine();
					if (id) {
						swal({
							position: 'top-end',
							type: 'success',
							title: 'State updated successfully',
							showConfirmButton: false,
							timer: 1500
						})
					} else {
						swal({
							position: 'top-end',
							type: 'success',
							title: 'State added successfully',
							showConfirmButton: false,
							timer: 1500
						})
					}
					this.router.navigate(['/state/list']);
				},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
		}
	}

	clearForm(stateForm) {
		this.stateEntity = {};
		this.stateEntity.StateId = 0;
		this.stateEntity.IsActive = '1';
		this.submitted = false;
		stateForm.form.markAsPristine();
	}

}
