import { Component, OnInit } from '@angular/core';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { ClientInviteService } from '../services/client-invite.service';
import { CommonService } from '../services/common.service';
declare function myInput(): any;
declare var $,swal: any;

@Component({
  selector: 'app-client-sign-up',
  templateUrl: './client-sign-up.component.html',
  styleUrls: ['./client-sign-up.component.css']
})
export class ClientSignUpComponent implements OnInit {
	InvitationEntity;
	submitted;
  btn_disable;
  open_register;

	constructor(public globals: Globals, private router: Router, private ClientInviteService: ClientInviteService,
		private route: ActivatedRoute, private CommonService: CommonService) { }


	ngOnInit() {
		this.globals.pageTitle = '- Client Sign-Up';
		myInput();
		$("body").addClass("height_100");
		if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
			$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
	} else {
	$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
}
    this.globals.isLoading = true;
    this.globals.msgflag = false;
		this.InvitationEntity = {};	
    this.ClientInviteService.check_openRegister()
    .then((data) => 
    {
      this.open_register = data['Value'];
      if(this.open_register=="1"){
        this.globals.isLoading = false;
      } else {
        this.globals.isLoading = false;
        this.router.navigate(['/pagenotfound']);
      }
    },
    (error) => 
    {
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
    });	
	}

	addInvitation(InvitationForm) {

		this.InvitationEntity.CreatedBy = 0;
    this.InvitationEntity.UpdatedBy = 0;
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
							text: 'You are already requested for Registration link. Please check your Email',
							
							})
					} else {
						this.btn_disable = false;
						this.submitted = false;
						this.InvitationEntity = {};
						InvitationForm.form.markAsPristine();
s
            swal({
							position: 'top-end',
							type: 'success',
							title: 'An Email with a Registration link has been sent to ' + s,
							showConfirmButton: false,
							timer: 5000
						})
            this.globals.isLoading = false;
						this.router.navigate(['/client-sign-up']);
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

}


