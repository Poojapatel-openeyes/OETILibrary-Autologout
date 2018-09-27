import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { ClientinvitelistService } from '../services/clientinvitelist.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape,swal: any;

@Component({
  selector: 'app-invitationlist',
  providers: [ ClientinvitelistService,CommonService ],
  templateUrl: './clientinvitelist.component.html',
  styleUrls: ['./clientinvitelist.component.css']
})
export class ClientinvitelistComponent implements OnInit {
  InvitationList;
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
//globals;
  constructor( private http: Http,public globals: Globals, private router: Router, private CommonService: CommonService, private ClientinvitelistService: ClientinvitelistService,private route:ActivatedRoute) { }

  ngOnInit() { 
	this.globals.pageTitle = '- Invited Client';
	$("footer").addClass("footer_admin");
	if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
        $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
    } else {
		$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
	}
	this.globals.isLoading = false;
	//this.globals = this.global;
	this.permissionEntity = {}; 
	if(this.globals.authData.RoleId==5){
		this.permissionEntity.View=1;
		this.permissionEntity.AddEdit=1;
		this.permissionEntity.Delete=1;
		this.default();
	} else {		
		this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'client-invitelist'})
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

	}
	
	default(){
		this.ClientinvitelistService.getAll()
		.then((data) => 
		{ 
        this.InvitationList = data['Inv'];
        this.Status = data['status'];
		setTimeout(function(){
			var table = $('#list_tables').DataTable( {
			 // scrollY: '55vh',
			  responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
				   "oLanguage": {
					 "sLengthMenu": "_MENU_ Client Invitations per Page",
					 "sInfo": "Showing _START_ to _END_ of _TOTAL_ Client Invitations",
					 "sInfoFiltered": "(filtered from _MAX_ total Client Invitations)",
					 "sInfoEmpty": "Showing 0 to 0 of 0 Client Invitations"
				   },
				   dom: 'lBfrtip',
				   buttons: [
						 
					   ]
				 });
				 
				 var buttons = new $.fn.dataTable.Buttons(table, {
				 buttons: [
							 {
							 extend: 'excel',
							 title: 'Client Invitation List',
							 exportOptions: {
							   columns: [ 0, 1, 2, 3 ]
							   }
							 },
							 {
							 extend: 'print',
							 title: 'Client Invitation List',
							 exportOptions: {
							   columns: [ 0, 1, 2, 3 ]
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
			$(".clientinvitelist").parent().addClass("in");
			$(".manageclients").addClass("active"); 
			$(".clientinvitelist").addClass("active");	
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
			text: "You want to revoke this client's invitation?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				var s=this.deleteEntity.EmailAddress;
				this.globals.isLoading = true;
				var del={'Userid':this.globals.authData.UserId,'id':Invitation.UserId};
				this.ClientinvitelistService.delete(del)
				.then((data) => 
				{
					this.globals.isLoading = false;
					let index = this.InvitationList.indexOf(Invitation);			
					this.InvitationList[index].StatusId = 2;
					swal({
						position: 'top-end',
						type: 'success',
						title:  s+' invitation revoked successfully',
						showConfirmButton: false,
						timer: 1500
					})
					//this.default();
				}, 
				(error) => 
				{
					$('#Delete_Modal').modal('hide');
					if(error.text){
						swal({
							position: 'top-end',
							type: 'danger',
							title: "You can't delete this record because of their dependency",
							showConfirmButton: false,
							timer: 1500
						})
					}	
				});	
			
			}
		
		})

	}

	
	
  ReInviteInvitation(Invitation)
	{ 
		this.ReInviteEntity =  Invitation;
		this.ReInviteEntity['UpdatedBy'] =  this.globals.authData.UserId;
		swal({
			title: 'Are you sure?',
			text: "You want to re-invite this client?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				var s=this.ReInviteEntity.EmailAddress;
	this.globals.isLoading = true;
		this.ClientinvitelistService.ReInvite(Invitation)
		.then((data) => 
		{
			this.globals.isLoading = false;
			let index = this.InvitationList.indexOf(Invitation);			
			this.InvitationList[index].StatusId = 1;
			swal({
				position: 'top-end',
				type: 'success',
				title:  s +' re-invited successfully',
				showConfirmButton: false,
				timer: 1500
			})
			//this.default();
		}, 
		(error) => 
		{
			this.globals.isLoading = false;
			$('#ReInvite_Modal').modal('hide');
			if(error.text){
				swal({
					position: 'top-end',
					type: 'danger',
					title: "You can't send this Email",
					showConfirmButton: false,
					timer: 1500
				})
			}	
		});	
	}


			
		})				
	}
	
	

}
