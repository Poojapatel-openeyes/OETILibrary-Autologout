import { Component, OnInit } from '@angular/core';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { ClientInviteService } from '../services/client-invite.service';
import { CommonService } from '../services/common.service';
declare function myInput(): any;
declare var $,swal: any;

@Component({
	selector: 'app-client-invite',
  templateUrl: './client-invite.component.html',
  styleUrls: ['./client-invite.component.css']
})
export class ClientInviteComponent implements OnInit {
	InvitationEntity;
	submitted;
	btn_disable;

	constructor(public globals: Globals, private router: Router, private ClientInviteService: ClientInviteService,
		private route: ActivatedRoute, private CommonService: CommonService) { }


	ngOnInit() {
		this.globals.pageTitle = '- Invite Client';
		myInput();
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
			this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Invite client'})
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
		this.InvitationEntity = {};	
	this.globals.isLoading = false;	
	setTimeout(function(){
		$(".test").removeClass("active");
		$(".test").parent().removeClass("in");
		$(".inviteclients").parent().addClass("in");
		$(".manageclients").addClass("active"); 
		$(".inviteclients").addClass("active");	

		if ($("body").height() < $(window).height()) {  
			$('footer').addClass('footer_fixed');     
	}      
	else{  
			$('footer').removeClass('footer_fixed');    
	}
	},500);	
	}

	addInvitation(InvitationForm) {

	this.InvitationEntity.CreatedBy = this.globals.authData.UserId;
    this.InvitationEntity.UpdatedBy = this.globals.authData.UserId;
    this.submitted = true;
		var s=this.InvitationEntity.EmailAddress;
		
		if (InvitationForm.valid) {
			this.btn_disable = true;
			this.globals.isLoading = true;
			this.ClientInviteService.add(this.InvitationEntity)
				.then((data) => {					
					this.globals.isLoading = false;
					if (data == 'email duplicate') {
						this.btn_disable = false;
						swal({
							type: 'warning',
							title: 'Oops...',
							text: 'You are already invited this client '+ s +'',
							
						  })
					} else {
						this.btn_disable = false;
						this.submitted = false;
						this.InvitationEntity = {};
						InvitationForm.form.markAsPristine();
						
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Registration link sent successfully to <b>' + s +'</b>',
							showConfirmButton: false,
							timer: 5000
						})
						this.globals.isLoading = false;
						this.router.navigate(['/client-invite']);
					}
				},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
		}
	}


	clearForm(InvitationForm) {
		this.InvitationEntity = {};	
    	this.submitted = false;
    	InvitationForm.form.markAsPristine();
	}
	
}

