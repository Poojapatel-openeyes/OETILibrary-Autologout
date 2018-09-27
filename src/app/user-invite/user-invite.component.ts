import { Component, OnInit } from '@angular/core';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { UserinvitelistService } from '../services/userinvitelist.service';
import { UserInviteService } from '../services/user-invite.service';
import { CommonService } from '../services/common.service';
declare function myInput(): any;
declare var $,swal: any;

@Component({
	selector: 'app-user-invite',
  templateUrl: './user-invite.component.html',
  styleUrls: ['./user-invite.component.css']
})
export class UserInviteComponent implements OnInit {
	InvitationEntity;
	submitted;
	btn_disable;
	LicenseList;
	TodaysDate;


	constructor(public globals: Globals, private router: Router, private UserInviteService: UserInviteService, private UserinvitelistService: UserinvitelistService,
		private route: ActivatedRoute, private CommonService: CommonService) { }


	ngOnInit() {
		this.InvitationEntity = {};	
		this.InvitationEntity.CLId='';
		this.globals.pageTitle = '- Invite User';
		
		if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
			$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
		} else {
		$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
	  }
		this.globals.isLoading = true;
		if(this.globals.authData.RoleId==5){		
			this.default();
		} else {
			this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'user-invite'})
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
		this.TodaysDate = new Date();
	}

	default(){
		this.globals.msgflag = false;
		this.InvitationEntity = {};	
		this.globals.isLoading = false;	
		if(this.globals.authData.RoleId==3)
		{ debugger
		this.UserinvitelistService.getAll({roleid:this.globals.authData.RoleId,userid:this.globals.authData.UserId})
			.then((data) => 
			{
			
				this.LicenseList = data['licenses'];
			
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
		$(".userinvite").parent().addClass("in");
		$(".manageusers").addClass("active"); 
		$(".userinvite").addClass("active");	
		if ($("body").height() < $(window).height()) {  
			$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}
		myInput();
	},500);	
	}

	addInvitation(InvitationForm) {
 
		this.InvitationEntity.CreatedBy = this.globals.authData.UserId;
    this.InvitationEntity.UpdatedBy = this.globals.authData.UserId;
    this.submitted = true;
		var s=this.InvitationEntity.EmailAddress;
		this.InvitationEntity.RoleId=this.globals.authData.RoleId;
		if (InvitationForm.valid) {
			if(this.globals.authData.RoleId!=3)
			{
				this.InvitationEntity.CLId=0;
			}
			this.btn_disable = true;
			this.globals.isLoading = true;
			this.InvitationEntity.WorkspaceURL = localStorage.getItem('company');	
			this.UserInviteService.userinvite(this.InvitationEntity)
				.then((data) => {					
					this.globals.isLoading = false;
					if (data == 'email duplicate') {
						this.btn_disable = false;
	
						swal({
							type: 'warning',
							title: 'Oops...',
							text: 'You already invited this Email Address',
							
						  })
					} else {
						this.btn_disable = false;
						this.submitted = false;
						this.InvitationEntity = {};
						InvitationForm.form.markAsPristine();
					
						
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Invitation link sent successfully to <b>' + s ,
							showConfirmButton: false,
							timer: 5000
						})
						this.globals.isLoading = false;
						this.router.navigate(['/user-invite']);
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

