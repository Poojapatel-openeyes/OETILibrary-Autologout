import { Component, OnInit, ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CategoryService } from '../services/category.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape	: any;

@Component({
  selector: 'app-category-list',
  templateUrl: './category-list.component.html',
  styleUrls: ['./category-list.component.css']
})
export class CategoryListComponent implements OnInit {

	categoryList;
	deleteEntity;
	msgflag;
	message;
	type;
	permissionEntity;
	
	constructor(private el: ElementRef, private http: Http, private router: Router, private route: ActivatedRoute,
		 private CategoryService: CategoryService, private CommonService: CommonService, public globals: Globals) 
  {
	
  }

  ngOnInit() {
    this.globals.pageTitle = '- Feedback Category';
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
	if ( $('#container').hasClass( "active_ulmainscreen" ) ) {
        $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
    }
    this.permissionEntity = {}; 
    if(this.globals.authData.RoleId==5){
      this.permissionEntity.View=1;
      this.permissionEntity.AddEdit=1;
      this.permissionEntity.Delete=1;
      this.default();
    } else {		
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Category'})
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
    this.CategoryService.getAll()
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
                 "sLengthMenu": "_MENU_ Categories per Page",
                 "sInfo": "Showing _START_ to _END_ of _TOTAL_ Categories",
                 "sInfoFiltered": "(filtered from _MAX_ total Categories)",
                 "sInfoEmpty": "Showing 0 to 0 of 0 Categories"
               },
               dom: 'lBfrtip',
               buttons: [
                     
                   ]
             });
             
             var buttons = new $.fn.dataTable.Buttons(table, {
             buttons: [
                         {
                         extend: 'excel',
                         title: 'Category List',
                         exportOptions: {
                           columns: [ 0, 1, 2, 3 ]
                           }
                         },
                         {
                         extend: 'print',
                         title: 'Category List',
                         exportOptions: {
                           columns: [ 0, 1, 2, 3 ]
                           }
                         },
                     ]
           }).container().appendTo($('#buttons'));
      },100); 
      this.categoryList = data;	
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
      $(".category").parent().addClass("in");
      $(".managecontent").addClass("active"); 
      $(".category").addClass("active");	
      if ($("body").height() < $(window).height()) {  
        $('footer').addClass('footer_fixed');     
    }      
    else{  
        $('footer').removeClass('footer_fixed');    
    }
		},500);
  }
	
	deletecategory(category)
	{ 
		this.deleteEntity =  category;
		$('#Delete_Modal').modal('show');					
	}

	deleteConfirm(category)
	{ var del={'Userid':this.globals.authData.UserId,'id':category.FeedbackCategoryId};
		this.CategoryService.delete(del)
		.then((data) => 
		{
			let index = this.categoryList.indexOf(category);
			$('#Delete_Modal').modal('hide');
			if (index != -1) {
				this.categoryList.splice(index, 1);
			}	
			this.globals.message = 'Feedback Category deleted successfully';
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
    if(this.categoryList[i].IsActive==1){
      this.categoryList[i].IsActive = 0;
      changeEntity.IsActive = 0;
    } else {
      this.categoryList[i].IsActive = 1;
      changeEntity.IsActive = 1;
    }
    this.globals.isLoading = true;
    changeEntity.UpdatedBy = this.globals.authData.UserId;
		this.CategoryService.isActiveChange(changeEntity)
		.then((data) => 
		{	      
      this.globals.isLoading = false;	
			this.globals.message = 'Feedback Category updated successfully';
			this.globals.type = 'success';
			this.globals.msgflag = true;			
		}, 
		(error) => 
		{
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
		});		
	}
	
}


