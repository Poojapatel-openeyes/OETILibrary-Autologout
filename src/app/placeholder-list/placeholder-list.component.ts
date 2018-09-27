import { Component, OnInit, ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { PlaceholderService } from '../services/placeholder.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape,swal: any;

@Component({
  selector: 'app-placeholder-list',
  templateUrl: './placeholder-list.component.html',
  styleUrls: ['./placeholder-list.component.css']
})
export class PlaceholderListComponent implements OnInit {

	placeholderList;
	deleteEntity;
	msgflag;
	message;
	type;
	permissionEntity;
	
	constructor(private el: ElementRef, private http: Http, private router: Router, private route: ActivatedRoute,
		 private PlaceholderService: PlaceholderService, private CommonService: CommonService, public globals: Globals) 
  {
	
  }

  ngOnInit() { 
	this.globals.pageTitle = '- Placeholder';
	$("footer").addClass("footer_admin");
	this.globals.isLoading = true;
	$("body").tooltip({
		selector: "[data-toggle='tooltip']"
	});
	if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
		$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
	} else {
	$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
  }
	// if(this.globals.authData.RoleId!=5){
	// 	this.router.navigate(['/pagenotfound']);
	//   }

		this.permissionEntity = {}; 
	if(this.globals.authData.RoleId==5){
		this.permissionEntity.View=1;
		this.permissionEntity.AddEdit=1;
		this.permissionEntity.Delete=1;
		this.default();
	} else {		
		this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Placeholder Screen'})
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
	this.PlaceholderService.getAll()
	.then((data) => 
	{ 
		setTimeout(function(){
			var table = $('#list_tables').DataTable( {
			  //scrollY: '55vh',
			   responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
			   scrollCollapse: true,           
				 "oLanguage": {
				 "sLengthMenu": "_MENU_ Placeholders per Page",
				 "sInfo": "Showing _START_ to _END_ of _TOTAL_ Placeholders",
				 "sInfoFiltered": "(filtered from _MAX_ total Placeholders)",
				 "sInfoEmpty": "Showing 0 to 0 of 0 Placeholders"
				 },
				 dom: 'lBfrtip',
				 buttons: [
				   
				   ]
			   });
			   
			   var buttons = new $.fn.dataTable.Buttons(table, {
			   buttons: [
					 {
					 extend: 'excel',
					 title: 'Placeholder List',
					 exportOptions: {
					   columns: [ 0, 1, 2, 3 ]
					   }
					 },
					 {
					 extend: 'print',
					 title: 'Placeholder List',
					 exportOptions: {
					   columns: [ 0, 1, 2, 3 ]
					   }
					 },
				   ]
			   }).container().appendTo($('#buttons'));
			},100); 
		this.placeholderList = data;	
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
		$(".placeholder").parent().addClass("in");
		$(".email").addClass("active"); 
		$(".placeholder").addClass("active");	
		if ($("body").height() < $(window).height()) {  
			$('footer').addClass('footer_fixed');     
		}      
		else{  
			$('footer').removeClass('footer_fixed');    
		}		       		
	},500);
	}
	
	deleteplaceholder(placeholder)
	{ 
		this.deleteEntity =  placeholder;
		swal({
			title: 'Are you sure?',
			text: "You want to remove this Placeholder?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		})
		.then((result) => {
			if (result.value) {
		this.PlaceholderService.delete(placeholder.PlaceholderId)
		.then((data) => 
		{
			let index = this.placeholderList.indexOf(placeholder);
			
			if (index != -1) {
				this.placeholderList.splice(index, 1);			
			}	
		
			swal({
				position: 'top-end',
				type: 'success',
				title: 'Placeholder deleted successfully',
				showConfirmButton: false,
				timer: 1500
			})
			
		}, 
		(error) => 
		{
			
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
    if(this.placeholderList[i].IsActive==1){
      this.placeholderList[i].IsActive = 0;
      changeEntity.IsActive = 0;
    } else {
      this.placeholderList[i].IsActive = 1;
      changeEntity.IsActive = 1;
    }
    this.globals.isLoading = true;
    changeEntity.UpdatedBy = this.globals.authData.UserId;
		this.PlaceholderService.isActiveChange(changeEntity)
		.then((data) => 
		{	      
      this.globals.isLoading = false;	

			swal({
				position: 'top-end',
				type: 'success',
				title: 'Placeholder updated successfully',
				showConfirmButton: false,
				timer: 5000
			})			
		}, 
		(error) => 
		{
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
		});		
	}
}


