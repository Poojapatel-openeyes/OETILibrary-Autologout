import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { MyLicensepackService } from '../services/my-licensepack.service';
import { Globals } from '.././globals';
declare function myInput(): any;
declare var $,unescape,swal: any;

@Component({
  selector: 'app-my-licensepack',
  templateUrl: './my-licensepack.component.html',
  styleUrls: ['./my-licensepack.component.css']
})
export class MyLicensepackComponent implements OnInit {

  LicensePackList;
	InviteEntity;
	InvitationEntity;
	submitted;
	btn_disable;
	TodaysDate;
	
  constructor(private router: Router, private route: ActivatedRoute, 
		private MyLicensepackService: MyLicensepackService, public globals: Globals) { }

  ngOnInit() {
	this.LicensePackList = [];
	this.globals.pageTitle = '- My License Pack';
	$("footer").addClass("footer_admin");
	if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
		$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
	} else {
	$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
  }
    this.default();
	$("body").tooltip({
		selector: "[data-toggle='tooltip']"
	});
	this.TodaysDate = new Date();
  }

  default(){
		this.InvitationEntity = {};	
    this.globals.isLoading = true;	
		this.MyLicensepackService.getAll(this.globals.authData.UserId)
		.then((data) => 
		{
      this.LicensePackList = data;
     
      setTimeout(function(){
        var table = $('#list_tables').DataTable( {
         // scrollY: '55vh',
		  responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
				  scrollCollapse: true,  
          "oLanguage": {
          "sLengthMenu": "_MENU_ Licensepacks per Page",
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ Licensepacks",
                "sInfoFiltered": "(filtered from _MAX_ total Licensepacks)",
                "sInfoEmpty": "Showing 0 to 0 of 0 Licensepacks"
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
						title: 'Licensepack List',
						exportOptions: {
							columns: [ 0, 1, 2, 3, 4, 5 ]
								}
							},
								{
								extend: 'print',
								title: 'Licensepack List',
								exportOptions: {
								columns: [ 0, 1, 2, 3, 4, 5 ]
								}
							},
						]
					}).container().appendTo($('#buttons'));
					myInput();
		},100); 
		this.globals.isLoading = false;	
    }, 
		(error) => 
		{
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);	
		});
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".mylicensepack").parent().addClass("in");
			$(".managelicense").addClass("active"); 
			$(".mylicensepack").addClass("active");	
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');  
				//myInput();   
			}      
			else{  
				$('footer').removeClass('footer_fixed');    
			}
			  },500);
	}
	userInvitation(ClientLicenseId)
	{ 
		this.InvitationEntity = {};	
		this.InvitationEntity.ClientLicenseId =  ClientLicenseId;
		$('#email').removeClass('filled');
		$('#email').parents('.form-group').removeClass('focused');  
		myInput();
		$('#invite_user').modal('show');

		//this.InvitationEntity = {};	
		
	
	}
	InviteConfirm(InvitationForm){
		this.InvitationEntity.CreatedBy = this.globals.authData.UserId;
    this.InvitationEntity.UpdatedBy = this.globals.authData.UserId;
    this.submitted = true;
		var s=this.InvitationEntity.EmailAddress;
		if (InvitationForm.valid) {
			this.btn_disable = true;
			this.globals.isLoading = true;
			this.MyLicensepackService.add(this.InvitationEntity)
				.then((data) => {					
					//this.globals.isLoading = false;
					//this.default();
					$('#invite_user').modal('hide');
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
							title: 'Invitation link sent successfully to <b>' + s,
							showConfirmButton: false,
							timer: 5000
						})
						this.globals.isLoading = false;
						this.router.navigate(['/my-licensepack']);
					}
					//this.globals.isLoading = true;	
					this.MyLicensepackService.getAll(this.globals.authData.UserId)
					.then((data) => 
					{
				  this.LicensePackList = data;
				  this.globals.isLoading = false;	
				}, 
					(error) => 
					{
						this.globals.isLoading = false;
						this.router.navigate(['/pagenotfound']);	
					});
				},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.globals.isLoading = false;
					$('#invite_user').modal('hide');
					this.router.navigate(['/pagenotfound']);
				});
		}
		
		
	}
	noForm(InvitationForm) {
		this.InvitationEntity = {};	
		this.submitted = false;
		InvitationForm.form.markAsPristine();
	}
}
