import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { DiscountTypeService } from '../services/discount-type.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';

declare var $,unescape,swal: any;
@Component({
  selector: 'app-discount-type-list',
  templateUrl: './discount-type-list.component.html',
  styleUrls: ['./discount-type-list.component.css']
})
export class DiscountTypeListComponent implements OnInit {

    DiscountTypeList;
	deleteEntity;
	msgflag;
	message;
	type;
	permissionEntity;

 constructor(public globals: Globals, private router: Router, 
	private DiscountTypeService: DiscountTypeService,private CommonService: CommonService, private route:ActivatedRoute) { }


  ngOnInit() { 	
		this.globals.pageTitle = '- Discount Type';
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
		this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Discount-type'})
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
		this.DiscountTypeService.getAll()
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
					 "sLengthMenu": "_MENU_ Discount types per Page",
					 "sInfo": "Showing _START_ to _END_ of _TOTAL_ Discount types",
					 "sInfoFiltered": "(filtered from _MAX_ total Discount types)",
					 "sInfoEmpty": "Showing 0 to 0 of 0 Discount types"
					 },
					 dom: 'lBfrtip',
					 buttons: [
					   
					   ]
				   });
				   
				   var buttons = new $.fn.dataTable.Buttons(table, {
				   buttons: [
						 {
						 extend: 'excel',
						 title: 'Discount Type List',
						 exportOptions: {
						   columns: [ 0, 1, 2, 3 ]
						   }
						 },
						 {
						 extend: 'print',
						 title: 'Discount Type List',
						 exportOptions: {
						   columns: [ 0, 1, 2, 3 ]
						   }
						 },
					   ]
				   }).container().appendTo($('#buttons'));
				},100); 
			this.DiscountTypeList = data;	
			this.globals.isLoading = false;
		}, 
		(error) => 
		{
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);
		});	
		this.msgflag = false;
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".discounttype").parent().addClass("in");
			$(".settings").addClass("active"); 
			$(".discounttype").addClass("active");
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}
		},500);
	}

	deleteDiscountType(DiscountType)
	{ 
		this.deleteEntity =  DiscountType;
		$('#Delete_Modal').modal('show');					
	}

	deleteConfirm(DiscountType)
	{ 	
		var del={'Userid':this.globals.authData.UserId,'id':DiscountType.ConfigurationId};
		this.DiscountTypeService.delete(del)
		.then((data) => 
		{
			let index = this.DiscountTypeList.indexOf(DiscountType);
			$('#Delete_Modal').modal('hide');
			if (index != -1) {
				this.DiscountTypeList.splice(index, 1);
			}	
			this.globals.message = 'Discount Type deleted successfully';
			this.globals.type = 'success';
			this.globals.msgflag = true;
		}, 
		(error) => 
		{
			$('#Delete_Modal').modal('hide');
			if(error.text){
				this.globals.message = "You can't delete this record because of their dependency!";
				this.globals.type = 'danger';
				this.globals.msgflag = true;
			}	
		});		
	}
	isActiveChange(changeEntity, i)
  { 
    if(this.DiscountTypeList[i].IsActive==1){
      this.DiscountTypeList[i].IsActive = 0;
      changeEntity.IsActive = 0;
    } else {
      this.DiscountTypeList[i].IsActive = 1;
      changeEntity.IsActive = 1;
    }
    this.globals.isLoading = true;
    changeEntity.UpdatedBy = this.globals.authData.UserId;
		this.DiscountTypeService.isActiveChange(changeEntity)
		.then((data) => 
		{	      
      this.globals.isLoading = false;	
	
			swal({
				position: 'top-end',
				type: 'success',
				title: 'Discount Type updated successfully' ,
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

