import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { DiscountService } from '../services/discount.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape,swal: any;

@Component({
  selector: 'app-discount-list',
  templateUrl: './discount-list.component.html',
  styleUrls: ['./discount-list.component.css']
})
export class DiscountListComponent implements OnInit {

	discountList;
	deleteEntity;
	msgflag;
	message;
	type;
	permissionEntity;

	 constructor(private router: Router, private route: ActivatedRoute, 
		private DiscountService: DiscountService, private CommonService: CommonService, public globals: Globals) { }

 ngOnInit()
  {	this.globals.pageTitle = '- Discount';
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
			this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Discount'})
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
		this.DiscountService.getAll()
		.then((data) => 
		{
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
             "sLengthMenu": "_MENU_ Discounts per Page",
             "sInfo": "Showing _START_ to _END_ of _TOTAL_ Discounts",
             "sInfoFiltered": "(filtered from _MAX_ total Discounts)",
             "sInfoEmpty": "Showing 0 to 0 of 0 Discounts"
             },
             dom: 'lBfrtip',
             buttons: [
               
               ]
           });
           
           var buttons = new $.fn.dataTable.Buttons(table, {
           buttons: [
                 {
                 extend: 'excel',
                 title: 'Discount List',
                 exportOptions: {
                   columns: [ 0, 1, 2, 3 ]
                   }
                 },
                 {
                 extend: 'print',
                 title: 'Discount List',
                 exportOptions: {
                   columns: [ 0, 1, 2, 3 ]
                   }
                 },
               ]
           }).container().appendTo($('#buttons'));
        },100); 
			this.discountList = data;
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
			$(".discount").parent().addClass("in");
			$(".managelicense").addClass("active"); 
			$(".discount").addClass("active");	
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}
	  },500);
	}

  deleteDiscount(Discount)
	{ 
		this.deleteEntity =  Discount;
	//	$('#Delete_Modal').modal('show');	
	swal({
		title: 'Are you sure?',
		text: "You want to remove this discount?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	})
	.then((result) => {
		if (result.value) {
			
			var del={'Userid':this.globals.authData.UserId,'id':Discount.DiscountId};
			this.DiscountService.deleteDiscount(del)
			.then((data) => 
			{
				let index = this.discountList.indexOf(Discount);
				$('#Delete_Modal').modal('hide');
				if (index != -1) {
					this.discountList.splice(index, 1);
				}	
					swal({
						position: 'top-end',
						type: 'success',
						title: 'Discount deleted successfully',
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
						title: 'You can’t delete Discount as it has been already used in License Pack',
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
    if(this.discountList[i].IsActive==1){
      this.discountList[i].IsActive = 0;
      changeEntity.IsActive = 0;
    } else {
      this.discountList[i].IsActive = 1;
      changeEntity.IsActive = 1;
    }
    this.globals.isLoading = true;
    changeEntity.UpdatedBy = this.globals.authData.UserId;
		this.DiscountService.isActiveChange(changeEntity)
		.then((data) => 
		{	      
      this.globals.isLoading = false;	

			swal({
				position: 'top-end',
				type: 'success',
				title: 'Discount updated successfully' ,
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

