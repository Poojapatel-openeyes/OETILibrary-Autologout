import { Component, OnInit, ElementRef } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CategoryService } from '../services/category.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare function myInput(): any;

declare var $,swal: any;
@Component({
  selector: 'app-category',
  templateUrl: './category.component.html',
  styleUrls: ['./category.component.css']
})

export class CategoryComponent implements OnInit 
{
	categoryEntity;
	submitted;
	btn_disable;
	header;
	
  constructor(private el: ElementRef, private router: Router, private route: ActivatedRoute, private CategoryService: CategoryService, public globals: Globals, private CommonService:CommonService)
    {		
	  }
  ngOnInit() 
  { 
    this.globals.pageTitle = '- Feedback Category';
    $("footer").addClass("footer_admin");
    if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
      $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
  } else {
  $('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
}
    this.globals.isLoading = true;	
    if(this.globals.authData.RoleId==5){		
      this.default();
    } else {
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Category'})
      .then((data) => 
      {
        if(data['AddEdit']==1){
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
    //sessionStorage.setItem('token', this.globals.authData);    
  } 

  default(){	
    this.categoryEntity = {};
    let id = this.route.snapshot.paramMap.get('id');
    this.globals.msgflag = false;
    if(id){
      this.header = 'Edit';
      this.CategoryService.getById(id)
      .then((data) => 
      { 
        if(data!=""){
          this.categoryEntity = data;
        } else {
          this.router.navigate(['/pagenotfound']);
        }	
        this.globals.isLoading = false;		
        setTimeout(function(){
					myInput();
			  },100); 
      }, 
      (error) => 
      {
        this.globals.isLoading = false;
        this.router.navigate(['/pagenotfound']);
      });	 
    } else {
      this.header = 'Add';
      this.categoryEntity = {};
      this.categoryEntity.FeedbackCategoryId = 0;
      this.categoryEntity.IsActive = '1';
      this.globals.isLoading = false;
      myInput();	
    }	
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
	
	addCategory(categoryForm)
	{		
		let id = this.route.snapshot.paramMap.get('id');
		if(id){			
			this.categoryEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {			
			this.categoryEntity.CreatedBy = this.globals.authData.UserId;
			this.categoryEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = true;
		}
		if(categoryForm.valid){
			this.btn_disable = true;
			this.CategoryService.add(this.categoryEntity)
			.then((data) => 
			{
				this.btn_disable = false;
				this.submitted = false;
				this.categoryEntity = {};
				categoryForm.form.markAsPristine();
				if(id){
          swal({
						position: 'top-end',
						type: 'success',
						title: 'Feedback Category updated successfully',
						showConfirmButton: false,
						timer: 1500
					})
				} else {
          swal({
						position: 'top-end',
						type: 'success',
						title: 'Feedback Category added successfully',
						showConfirmButton: false,
						timer: 1500
					  })
				}				
				this.router.navigate(['/category/list']);
			}, 
			(error) => 
			{
				this.btn_disable = false;
				this.submitted = false;
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});
		} 		
	}
	
	clearForm(categoryForm)
	{
		this.categoryEntity = {};	
		this.categoryEntity.FeedbackCategoryId = 0;
    this.categoryEntity.IsActive = '1';	
		this.submitted = false;
		categoryForm.form.markAsPristine();
	}	
	
}


