import { Component, OnInit, ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { SubCategoryService } from '../services/sub-category.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape,swal: any;

@Component({
  selector: 'app-sub-category-list',
  templateUrl: './sub-category-list.component.html',
  styleUrls: ['./sub-category-list.component.css']
})
export class SubCategoryListComponent implements OnInit {

	subcategoryList;
	deleteEntity;
	msgflag;
	message;
	type;
	permissionEntity;
	
	constructor(private el: ElementRef, private http: Http, private router: Router, private route: ActivatedRoute,
		 private SubCategoryService: SubCategoryService, private CommonService: CommonService, public globals: Globals) 
  {
	
  }

  ngOnInit() {
    this.globals.pageTitle = '- Feedback Sub-Category';
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
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Sub-Category'})
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
    this.SubCategoryService.getAll()
    .then((data) => 
    { 
      this.subcategoryList = data;	
      this.globals.isLoading = false;
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
             "sLengthMenu": "_MENU_ Sub-Categories per Page",
             "sInfo": "Showing _START_ to _END_ of _TOTAL_ Sub-Categories",
             "sInfoFiltered": "(filtered from _MAX_ total Sub-Categories)",
             "sInfoEmpty": "Showing 0 to 0 of 0 Sub-Categories"
             },
             dom: 'lBfrtip',
             buttons: [
               
               ]
           });
           
           var buttons = new $.fn.dataTable.Buttons(table, {
           buttons: [
                 {
                 extend: 'excel',
                 title: 'Sub-Category List',
                 exportOptions: {
                   columns: [ 0, 1, 2, 3 ]
                   }
                 },
                 {
                 extend: 'print',
                 title: 'Sub-Category List',
                 exportOptions: {
                   columns: [ 0, 1, 2, 3 ]
                   }
                 },
               ]
           }).container().appendTo($('#buttons'));
        },100); 
      	
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
      $(".subcategory").parent().addClass("in");
      $(".managecontent").addClass("active"); 
      $(".subcategory").addClass("active");	
      if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
			}      
			else{  
				$('footer').removeClass('footer_fixed');    
			}
		},500);
  }
	
	deletesubcategory(subcategory)
	{ 
    this.deleteEntity = subcategory;
    swal({
      title: 'Are you sure?',
      text: "You want to remove this Feedback Sub-Category?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    })
    .then((result) => {
      if (result.value) {
    var del={'Userid':this.globals.authData.UserId,'id':subcategory.FeedbackCategoryId};
		this.SubCategoryService.delete(del)
		.then((data) => 
		{
			let index = this.subcategoryList.indexOf(subcategory);
			$('#Delete_Modal').modal('hide');
			if (index != -1) {
				this.subcategoryList.splice(index, 1);
			}	
      swal({
        position: 'top-end',
        type: 'success',
        title: 'Feedback Sub-Category deleted successfully',
        showConfirmButton: false,
        timer: 1500
      })	
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
  })	
			
	}

	deleteConfirm(subcategory)
	{ debugger
    
	}
	isActiveChange(changeEntity, i)
  { 
    if(this.subcategoryList[i].IsActive==1){
      this.subcategoryList[i].IsActive = 0;
      changeEntity.IsActive = 0;
    } else {
      this.subcategoryList[i].IsActive = 1;
      changeEntity.IsActive = 1;
    }
    this.globals.isLoading = true;
    changeEntity.UpdatedBy = this.globals.authData.UserId;
		this.SubCategoryService.isActiveChange(changeEntity)
		.then((data) => 
		{	      
      this.globals.isLoading = false;	
		
			swal({
				position: 'top-end',
				type: 'success',
				title: 'Feedback Sub-Category updated successfully' ,
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



