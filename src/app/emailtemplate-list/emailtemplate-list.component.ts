import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { EmailtemplateService } from '../services/emailtemplate.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
import { forEach } from '@angular/router/src/utils/collection';
declare var $,unescape,swal: any;

@Component({
  selector: 'app-emailtemplate-list',
  templateUrl: './emailtemplate-list.component.html',
  styleUrls: ['./emailtemplate-list.component.css']
})
export class EmailtemplateListComponent implements OnInit {
	
  	EmailList;
	deleteEntity;
	msgflag;
	message;
	type;
	permissionEntity;

 constructor( private http: Http,public globals: Globals, private router: Router, 
	private EmailtemplateService: EmailtemplateService,private CommonService: CommonService, private route:ActivatedRoute) { }


ngOnInit() {  
	this.globals.pageTitle = '- Email Template';
	$("footer").addClass("footer_admin");
	if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
        $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
    } else {
		$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
	}
	this.globals.isLoading = true;
	$("body").tooltip({
		selector: "[data-toggle='tooltip']"
	});
	this.permissionEntity = {}; 
	if(this.globals.authData.RoleId==5){
		this.permissionEntity.View=1;
		this.permissionEntity.AddEdit=1;
		this.permissionEntity.Delete=1;
		this.default();
	} else {		
		this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Email Template'})
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
		this.EmailtemplateService.getAll()
		.then((data) => 
		{ 	
			setTimeout(function(){
				var table = $('#list_tables').DataTable( {
				//  scrollY: '55vh',
				 responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
				   scrollCollapse: true,           
					 "oLanguage": {
					 "sLengthMenu": "_MENU_ Email Templates per Page",
					 "sInfo": "Showing _START_ to _END_ of _TOTAL_ Email Templates",
					 "sInfoFiltered": "(filtered from _MAX_ total Email Templates)",
					 "sInfoEmpty": "Showing 0 to 0 of 0 Email Templates"
					 },
					 dom: 'lBfrtip',
					 buttons: [
					   
					   ]
				   });
				   
				   var buttons = new $.fn.dataTable.Buttons(table, {
				   buttons: [
						 {
						 extend: 'excel',
						 title: 'Email Template List',
						 exportOptions: {
						   columns: [ 0, 1, 2, 3 ]
						   }
						 },
						 {
						 extend: 'print',
						 title: 'Email Template List',
						 exportOptions: {
						   columns: [ 0, 1, 2, 3 ]
						   }
						 },
					   ]
				   }).container().appendTo($('#buttons'));
				},100); 	
			this.EmailList = data;
			this.globals.isLoading = false;
		}, 
		(error) => 
		{
			this.globals.isLoading = false;
			this.router.navigate(['/admin/pagenotfound']);
		});	
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".emailtemplate").parent().addClass("in");
			$(".email").addClass("active"); 
			$(".emailtemplate").addClass("active");	
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}
		},500);
	}

	deleteEmail(Email)
	{ 
		this.deleteEntity =  Email;
			
		swal({
			title: 'Are you sure?',
			text: "You want to remove this Email Template?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		})
		.then((result) => {
			if (result.value) {	
				this.EmailtemplateService.delete(Email.EmailId)
				.then((data) => 
				{
					let index = this.EmailList.indexOf(Email);
					$('#Delete_Modal').modal('hide');
					if (index != -1) {
						this.EmailList.splice(index, 1);
					}	
			
					swal({
						position: 'top-end',
						type: 'success',
						title: 'Email Template deleted successfully',
						showConfirmButton: false,
						timer: 1500
					})
				}, 
				(error) => 
				{
					$('#Delete_Modal').modal('hide');
					if(error.text){
						swal({
							position: 'top-end',
							type: 'success',
							title: "You can't delete this record because of their dependency",
							showConfirmButton: false,
							timer: 1500
						})
					}	
				});		
		
				
			}
		})			
	}


	isActiveChange(changeEntity, i)
  { 
    if(this.EmailList[i].IsActive==1){
      this.EmailList[i].IsActive = 0;
      changeEntity.IsActive = 0;
    } else {
      this.EmailList[i].IsActive = 1;
      changeEntity.IsActive = 1;
    }
    this.globals.isLoading = true;
    changeEntity.UpdatedBy = this.globals.authData.UserId;
		this.EmailtemplateService.isActiveChange(changeEntity)
		.then((data) => 
		{	      
      this.globals.isLoading = false;	
		
			swal({
				position: 'top-end',
				type: 'success',
				title: 'Email Template updated successfully',
				showConfirmButton: false,
				timer: 1500
			})			
		}, 
		(error) => 
		{
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
		});		
	}
}

