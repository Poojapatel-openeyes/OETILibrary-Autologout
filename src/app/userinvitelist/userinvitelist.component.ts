import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { UserinvitelistService } from '../services/userinvitelist.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape,swal: any;
declare function myInput(): any;

@Component({
  selector: 'app-invitationlist',
  providers: [ UserinvitelistService,CommonService ],
  templateUrl: './userinvitelist.component.html',
  styleUrls: ['./userinvitelist.component.css']
})
export class UserinvitelistComponent implements OnInit {
  InvitationList;
  InvitationEntity;
  Status;
	ReInviteEntity;
	deleteEntity;
	msgflag;
	message;
  type;
  permissionEntity;
  invimsgsuccess;
  invimsgrevoke;
	invimsgpending;
	provideLicenseEntity;
	LicenseList;
	TodaysDate;
	submitted;
	btn_disable;
//globals;
  constructor( private http: Http,public globals: Globals, private router: Router, private CommonService: CommonService, private UserinvitelistService: UserinvitelistService,private route:ActivatedRoute) { }

  ngOnInit() { 
		this.globals.pageTitle = '- Invited User';
	$("footer").addClass("footer_admin");

	if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
		$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
	} else {
	$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
  }
	this.globals.isLoading = false;
	this.permissionEntity = {}; 
	if(this.globals.authData.RoleId==5){
		this.permissionEntity.View=1;
		this.permissionEntity.AddEdit=1;
		this.permissionEntity.Delete=1;
		this.default();
	} else {		
		this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'user-invitelist'})
		.then((data) => 
		{
			this.permissionEntity = data;
			if(this.permissionEntity.View==1 ||  this.permissionEntity.AddEdit==1 || this.permissionEntity.Delete==1){
				this.default();
			} else {
				this.router.navigate(['/access-denied']);
			}		
		},
		(error) => 
		{
			//alert('error');
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);
		});	
	}
	this.TodaysDate = new Date();
	}
	
	default(){
		//this.InvitationEntity.ParentId ='';
		//this.InvitationEntity.ParentId = this.globals.authData.UserId;
		this.provideLicenseEntity = {};	
		this.UserinvitelistService.getAll({roleid:this.globals.authData.RoleId,userid:this.globals.authData.UserId})
		.then((data) => 
		{ 
        this.InvitationList = data['Inv'];
				this.Status = data['status'];
				this.LicenseList = data['licenses'];
				
		  setTimeout(function(){
			myInput();
			var table = $('#list_tables').DataTable( {
			//	scrollY: '55vh',
			 responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
           scrollCollapse: true,     
			  "oLanguage": {
				"sLengthMenu": "_MENU_ User Invitations per Page",
				"sInfo": "Showing _START_ to _END_ of _TOTAL_ User Invitations",
				"sInfoFiltered": "(filtered from _MAX_ total User Invitations)",
				"sInfoEmpty": "Showing 0 to 0 of 0 User Invitations"
			  },
			  dom: 'lBfrtip',
				buttons: [
							//'pageLength','print','excel'
						 ]
			});
			var buttons = new $.fn.dataTable.Buttons(table, {
				buttons: [
						{
						extend: 'excel',
						title: 'User Invitation List',
						exportOptions: {
							columns: [ 0, 1, 2, 3, 4, 5 ]
								}
							},
								{
								extend: 'print',
								title: 'User Invitation List',
								exportOptions: {
								columns: [ 0, 1, 2, 3, 4, 5 ]
								}
							},
						]
					}).container().appendTo($('#buttons'));
		  },100); 
		  this.globals.isLoading = false;
		}, 
		(error) => 
		{
		 // alert('error');
		 this.globals.isLoading = false;
	     this.router.navigate(['/admin/pagenotfound']);
		});	
		//this.msgflag = false;
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".userinvitelist").parent().addClass("in");
			$(".manageusers").addClass("active"); 
			$(".userinvitelist").addClass("active");	
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
			}      
			else{  
					$('footer').removeClass('footer_fixed');    
			}
		},500);
		}
		
	
	deleteInvitation(Invitation)
	{ 
		this.deleteEntity =  Invitation;
		swal({
			title: 'Are you sure?',
			text: "You want to revoke this Email?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		})
		.then((result) => {
			if (result.value) {
		this.globals.isLoading = true;
		var del={'Userid':this.globals.authData.UserId,'id':Invitation.UserId,'ClientLicenseId':Invitation.ClientLicenseId};
		this.UserinvitelistService.delete(del)
		.then((data) => 
		{
			this.globals.isLoading = false;
			let index = this.InvitationList.indexOf(Invitation);			
			this.InvitationList[index].StatusId = 2;
			this.InvitationList[index].ClientLicenseId = 0;
			//this.InvitationList[index].Status =0;
	
			// if (index != -1) {
				// this.InvitationList.splice(index, 1);
				//this.router.navigate(['/domain/list']);
				// setTimeout(function(){
				// 	$('#dataTables-example').dataTable( {
				// 		"oLanguage": {
				// 			"sLengthMenu": "_MENU_ Domains per Page",
				// 			"sInfo": "Showing _START_ to _END_ of _TOTAL_ Domains",
				// 			"sInfoFiltered": "(filtered from _MAX_ total Domains)"
				// 		}
				// 	});
				// },3000); 
			// }			
			//alert(data);
			//this.default();
			
			swal({
				position: 'top-end',
				type: 'success',
				title: 'Revoked Successfully',
				showConfirmButton: false,
				timer: 1500
			})
		}, 
		(error) => 
		{
			$('#Delete_Modal').modal('hide');
			if(error.text){
				this.globals.message = "You can't delete this record because of their dependency";
				this.globals.type = 'danger';
				this.globals.msgflag = true;
			}	
		});	
	}
	})
				
	}


	
  ReInviteInvitation(Invitation)
	{ 
		
		this.provideLicenseEntity =  Invitation;
		//console.log(this.provideLicenseEntity);
		this.provideLicenseEntity['UpdatedBy'] =  this.globals.authData.UserId;
		this.provideLicenseEntity['RoleId'] =  this.globals.authData.RoleId;
		if(this.globals.authData.RoleId==3){
			//this.provideLicenseEntity['ClientLicenseId'] =  Invitation.ClientLicenseId;
		} else {
			//this.provideLicenseEntity['ClientLicenseId'] =  0;
			this.provideLicenseEntity['CLId'] =  0;
		}
		
		swal({
			title: 'Are you sure?',
			text: "You want to remove this User?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		})
		.then((result) => {
			if (result.value) {
				this.globals.isLoading = true;
				this.UserinvitelistService.ReInvite(this.provideLicenseEntity)
		.then((data) => 
		{
			this.globals.isLoading = false;
			$('#ReInvite_Modal').modal('hide');
			let index = this.InvitationList.indexOf(this.provideLicenseEntity);
			this.InvitationList[index].StatusId = 1;
			this.InvitationList[index  ].ClientLicenseId = this.provideLicenseEntity.CLId;
			this.btn_disable = false;
			this.submitted = false;
			this.provideLicenseEntity = {};
			
			this.globals.message = 'Re-Invite Successfully';
			this.globals.type = 'success';
			swal({
				position: 'top-end',
				type: 'success',
				title: 'Re-Invite Successfully',
				showConfirmButton: false,
				timer: 2500
			})
			//this.globals.msgflag = true;
			this.globals.isLoading = false;
			this.router.navigate(['/user-invitelist']);
		}, 
		(error) => 
		{
			this.globals.isLoading = false;
			$('#ReInvite_Modal').modal('hide');
			if(error.text){
				this.globals.message = "You can't send this Email";
				this.globals.type = 'danger';
				this.globals.msgflag = true;
			}	
		});	
				
			}})				
	}
	
	ReInviteConfirm(InvitationForm)
	 { debugger
	// 	this.provideLicenseEntity.CreatedBy = this.globals.authData.UserId;
	// 	this.provideLicenseEntity.Id = this.globals.authData.UserId;
	// this.provideLicenseEntity.UpdatedBy = this.globals.authData.UserId;
	// this.provideLicenseEntity.RoleId=this.globals.authData.RoleId;
    // this.submitted = true;
	// 	//var s=this.provideLicenseEntity.EmailAddress;
	// 	if (InvitationForm.valid) {
	// 		this.btn_disable = true;
	// 		this.globals.isLoading = true;
			
	// 	this.UserinvitelistService.ReInvite(this.provideLicenseEntity)
	// 	.then((data) => 
	// 	{
	// 		this.globals.isLoading = false;
	// 		$('#ReInvite_Modal').modal('hide');
	// 		let index = this.InvitationList.indexOf(this.provideLicenseEntity);
	// 		this.InvitationList[index].StatusId = 1;
	// 		this.InvitationList[index  ].ClientLicenseId = this.provideLicenseEntity.CLId;
	// 		this.btn_disable = false;
	// 		this.submitted = false;
	// 		this.provideLicenseEntity = {};
	// 		InvitationForm.form.markAsPristine();
	// 		this.globals.message = 'Re-Invite Successfully';
	// 		this.globals.type = 'success';
	// 		swal({
	// 			position: 'top-end',
	// 			type: 'success',
	// 			title: 'Re-Invite Successfully',
	// 			showConfirmButton: false,
	// 			timer: 5000
	// 		})
	// 		this.globals.msgflag = true;
	// 		this.globals.isLoading = false;
	// 		this.router.navigate(['/user-invitelist']);
	// 	}, 
	// 	(error) => 
	// 	{
	// 		this.globals.isLoading = false;
	// 		$('#ReInvite_Modal').modal('hide');
	// 		if(error.text){
	// 			this.globals.message = "You can't send this Email";
	// 			this.globals.type = 'danger';
	// 			this.globals.msgflag = true;
	// 		}	
	// 	});	
	// }
}

  isActiveChange(changeEntity, i)
  { 
    if(this.InvitationList[i].IsActive==1){
      this.InvitationList[i].IsActive = 0;
      changeEntity.IsActive = 0;
    } else {
      this.InvitationList[i].IsActive = 1;
      changeEntity.IsActive = 1;
    }
    this.globals.isLoading = true;
    changeEntity.UpdatedBy = this.globals.authData.UserId;
		this.UserinvitelistService.isActiveChange(changeEntity)
		.then((data) => 
		{	      
      		this.globals.isLoading = false;	
		
			//this.globals.msgflag = true;
			swal({
				title: "Success",
				text: "User updated successfully.",
				type: "success",
				timer: 4000,
				showConfirmButton: true
			  });			
		}, 
		(error) => 
		{
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);
		});		
	}

	noForm(InvitationForm) {
		this.InvitationEntity = {};	
		this.submitted = false;
		InvitationForm.form.markAsPristine();
	}
}
