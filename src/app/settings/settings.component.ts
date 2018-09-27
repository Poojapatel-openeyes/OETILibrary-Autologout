import { Component, OnInit, ElementRef } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { SettingsService } from '../services/settings.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,swal: any;
declare function myInput(): any;

@Component({
  selector: 'app-settings',
  templateUrl: './settings.component.html',
  styleUrls: ['./settings.component.css']
})
export class SettingsComponent implements OnInit {
  
	submitted;
	btn_disable;
	submitted1;
	btn_disable1;
	submitted2;
	btn_disable2;
	submitted3;
	btn_disable3;
	submitted4;
	btn_disable4;
	submitted5;
	btn_disable5;
	submitted6;
	btn_disable6;
	submitted7;
	btn_disable7;
	submitted8;
	btn_disable8;
  	header;
  	teamsizeList;
	deleteEntity;
	configEntity;
	updateEntity;
	cmsgflag;
	cmessage;
	cmsgflag1;
	cmessage1;
	reminderDaysList;
	permissionEntity;
	ContactEntity;
	NoOfCArea;
	ksaError;
	totksaError;
	NoKSA;
	InviEntity;
	contactUsEntity;
	ReminderEntity;
	//cuaddress;
	//cuphoneno;
	//cuemail;

	
  constructor(private el: ElementRef, private router: Router, 
	private route: ActivatedRoute, private SettingsService: SettingsService,private CommonService: CommonService, public globals: Globals)
    {
		
	 }

  ngOnInit() {
	this.globals.pageTitle = '- General Settings';
	$("footer").addClass("footer_admin");
	if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
		$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
	} else {
	$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
  }
	//myInput();
	this.globals.isLoading = true;
	this.permissionEntity = {}; 
	this.ksaError = false;
	this.totksaError = false;
	
	if(this.globals.authData.RoleId==5){
		this.permissionEntity.View=1;
		this.permissionEntity.AddEdit=1;
		this.permissionEntity.Delete=1;
		this.default();
	} else {		
		this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Configuration'})
		.then((data) => 
		{
			this.permissionEntity = data;
			if(this.permissionEntity.View==1 ||  this.permissionEntity.AddEdit==1 || this.permissionEntity.Delete==1){
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
    this.globals.isLoading = false;
	var item = { 'Day': '', 'CreatedBy': this.globals.authData.UserId, 'UpdatedBy':this.globals.authData.UserId};
    this.reminderDaysList = [];
    this.reminderDaysList.push(item);
	this.submitted3 = false;
	 this.header = 'Add';
	 this.configEntity = {};
	 this.ContactEntity={};
	 this.InviEntity={};
	 this.contactUsEntity={};
	 this.ReminderEntity={};
	//  this.cuaddress={};
	//  this.cuphoneno={};
	//  this.cuemail={};
	 this.cmsgflag = false;
   this.SettingsService.getAll(this.globals.authData.UserId)
	.then((data) =>  
	{ 
		this.configEntity.IsOpenRegister = data['isopenregister']['Value'];	
		this.configEntity.emailpassword = data['emailpassword']['Value'];		
		this.configEntity.emailfrom = data['emailfrom']['Value'];
		this.ContactEntity.ContactFrom = data['Contact']['Value'];
		this.InviEntity.Success = data['Invimsg']['Success'];
		this.InviEntity.Revoke = data['Invimsg']['Revoke'];
		this.InviEntity.Pending = data['Invimsg']['Pending'];
		this.ReminderEntity.noofLicense = data['reminder']['noofLicense'];
		this.ReminderEntity.LicenseExpiry = data['reminder']['LicenseExpiry'];
		this.ReminderEntity.IncompleteFeedback = data['reminder']['IncompleteFeedback'];
		this.contactUsEntity = data['contactus'];
		// this.cuaddress = data['contactus']['address'];
		// this.cuphoneno = data['contactus']['phoneno'];
		// this.cuemail = data['contactus']['email'];
		this.globals.isLoading = false;	
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".configuration").parent().addClass("in");
			$(".settings").addClass("active"); 
			$(".configuration").addClass("active");	
			myInput();		       		
		},500);
	}, 
	(error) => 
	{
		this.globals.isLoading = false;
		this.router.navigate(['/pagenotfound']);	
	});
	
  }

  AddNewRDays(index){ 
	var item = { 'Day': '', 'CreatedBy': this.globals.authData.UserId, 'UpdatedBy':this.globals.authData.UserId};
	if (this.reminderDaysList.length <= index + 1) {
		this.reminderDaysList.splice(index + 1, 0, item);
	}
  }

  DeleteRDays(item){ 
	var index = this.reminderDaysList.indexOf(item);	
	this.reminderDaysList.splice(index, 1);		
  }

	
	addinvitation(invitationForm)
	{		
		this.updateEntity = {};
		this.updateEntity.Key = 'Invitation';
		this.updateEntity.Value = this.configEntity.invitation;
		this.updateEntity.UpdatedBy = this.globals.authData.UserId;
		//this.submitted2 = true;
		if(invitationForm.valid){
			this.btn_disable2 = true;
			this.SettingsService.update_config(this.updateEntity)
			.then((data) => 
			{		
				this.btn_disable2 = false;
				this.submitted2 = false;
	 			this.updateEntity = {};
				 invitationForm.form.markAsPristine();
				 swal({
					position: 'top-end',
					type: 'success',
					title: 'Invitation Features updated successfully',
					showConfirmButton: false,
					timer: 1500
				})
			}, 
			(error) => 
			{
				//alert('error');
				this.btn_disable2 = false;
				this.submitted2 = false;
				this.globals.isLoading = false;
				this.router.navigate(['/admin/pagenotfound']);
			});
		} 		
	}



	addEmailFrom(fromForm)
	{	
		//this.submitted4 = true;
		if(fromForm.valid){
			this.btn_disable4 = true;
			this.SettingsService.update_email({'EmailFrom':this.configEntity.emailfrom,'EmailPassword':this.configEntity.emailpassword,'UpdatedBy':this.globals.authData.UserId})
			.then((data) => 
			{		
				this.btn_disable4 = false;
				this.submitted4 = false;
	 			this.updateEntity = {};
				 fromForm.form.markAsPristine();
				 swal({
					position: 'top-end',
					type: 'success',
					title: 'SMTP Details updated successfully',
					showConfirmButton: false,
					timer: 1500
				})
			}, 
			(error) => 
			{
				//alert('error');
				this.btn_disable4 = false;
				this.submitted4 = false;
				this.globals.isLoading = false;
				this.router.navigate(['/admin/pagenotfound']);
			});
		} 		
	}
	addcontact(contForm)
	{	
	
		//this.submitted5 = true;
		if(contForm.valid){
			this.btn_disable5 = true;
			this.SettingsService.addcontact(this.ContactEntity)
			.then((data) => 
			{		
				this.btn_disable5 = false;
				this.submitted5 = false;
	 			this.updateEntity = {};
				 contForm.form.markAsPristine();
			
				 swal({
					position: 'top-end',
					type: 'success',
					title: 'Contact Us Email updated successfully',
					showConfirmButton: false,
					timer: 1500
				})
			}, 
			(error) => 
			{
				//alert('error');
				this.btn_disable5 = false;
				this.submitted5 = false;
				this.globals.isLoading = false;
				this.router.navigate(['/admin/pagenotfound']);
			});
		} 		
  }
  addOpenRegister(registerForm)
	{		
		this.submitted1 = true;
		if(registerForm.valid){
			this.btn_disable1 = true;
			this.SettingsService.addOpenRegister(this.configEntity)
			.then((data) => 
			{		
				this.btn_disable1 = false;
				this.submitted1 = false;
	 			this.updateEntity = {};
				 registerForm.form.markAsPristine();
		
				 swal({
					position: 'top-end',
					type: 'success',
					title: 'Open Registration updated successfully',
					showConfirmButton: false,
					timer: 1500
				})
			}, 
			(error) => 
			{
				//alert('error');
				this.btn_disable1 = false;
				this.submitted1 = false;
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});
		} 		
	}
	addInvitationm(InvitationForm)
	{	
		//this.submitted6 = true;
		if(InvitationForm.valid){
			this.btn_disable6 = true;
			this.SettingsService.addinvimsg(this.InviEntity)
			.then((data) => 
			{		
				this.btn_disable6 = false;
				this.submitted6 = false;
	 			this.updateEntity = {};
				 InvitationForm.form.markAsPristine();
				 swal({
					position: 'top-end',
					type: 'success',
					title: 'Invitation Message updated successfully',
					showConfirmButton: false,
					timer: 1500
				})
			}, 
			(error) => 
			{
				//alert('error');
				this.btn_disable6 = false;
				this.submitted6 = false;
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});
		} 		
	}

	addContactus(ContactusForm)
	{			
		if(ContactusForm.valid){
			this.btn_disable7 = true;
			this.SettingsService.update_contactus(this.contactUsEntity)
			.then((data) => 
			{		
				this.btn_disable7 = false;
				this.submitted7 = false;
				 ContactusForm.form.markAsPristine();
			
				 swal({
					position: 'top-end',
					type: 'success',
					title: 'Contact Us details updated successfully',
					showConfirmButton: false,
					timer: 1500
				})
			}, 
			(error) => 
			{
				this.btn_disable7 = false;
				this.submitted7 = false;
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});
		} 		
	}
	addReminder(ReminderForm)
	{	this.globals.isLoading = true;
		//this.submitted6 = true;
		if(ReminderForm.valid){
			this.btn_disable8 = true;
			this.SettingsService.addreminder(this.ReminderEntity)
			.then((data) => 
			{		
				this.globals.isLoading = false;
				this.btn_disable8 = false;
				this.submitted8 = false;
	 			this.updateEntity = {};
				 ReminderForm.form.markAsPristine();
				 swal({
					position: 'top-end',
					type: 'success',
					title: 'Reminder updated successfully',
					showConfirmButton: false,
					timer: 1500
				})
			}, 
			(error) => 
			{
				//alert('error');
				this.btn_disable8 = false;
				this.submitted8 = false;
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});
		} 		
	}

}
