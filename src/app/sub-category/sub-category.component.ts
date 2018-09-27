import { Component, OnInit, ElementRef } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { SubCategoryService } from '../services/sub-category.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
import { debug } from 'util';
declare function myInput(): any;
declare var $,swal: any;

@Component({
  selector: 'app-sub-category',
  templateUrl: './sub-category.component.html',
  styleUrls: ['./sub-category.component.css']
})

export class SubCategoryComponent implements OnInit 
{
	subcategoryEntity;
	submitted;
	btn_disable;
  header;
  maincatList;
	
  constructor(private el: ElementRef, private router: Router, private route: ActivatedRoute, private SubCategoryService: SubCategoryService, public globals: Globals, private CommonService:CommonService)
    {		
    }
    
  ngOnInit() 
  { 
    this.globals.pageTitle = '- Feedback Sub-Category';
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
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Sub-Category'})
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
  } 

  default(){	
    this.subcategoryEntity = {};
    let id = this.route.snapshot.paramMap.get('id');
    this.globals.msgflag = false;

    this.SubCategoryService.getMainCatList()
			.then((data) => {
				this.maincatList = data;
				this.globals.isLoading = false;
			},
			(error) => {
        this.globals.isLoading = false;	
        this.router.navigate(['/pagenotfound']);
      });
      
    if(id){debugger
      this.header = 'Edit';
      this.SubCategoryService.getById(id)
      .then((data) => 
      { 
        if(data!=""){
          this.subcategoryEntity = data;
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
      this.subcategoryEntity = {};
      this.subcategoryEntity.ParentId = '';
      this.subcategoryEntity.FeedbackCategoryId = 0;
      this.subcategoryEntity.IsReverseAnswer = '0';
      this.subcategoryEntity.IsActive = '1';
      this.globals.isLoading = false;	
      myInput();
    }	
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
	
	addSubCategory(subcategoryForm)
	{		debugger
		let id = this.route.snapshot.paramMap.get('id');
		if(id){			
			this.subcategoryEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {			
			this.subcategoryEntity.CreatedBy = this.globals.authData.UserId;
			this.subcategoryEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = true;
		}
		if(subcategoryForm.valid){
			this.btn_disable = true;
			this.SubCategoryService.add(this.subcategoryEntity)
			.then((data) => 
			{
				this.btn_disable = false;
				this.submitted = false;
				this.subcategoryEntity = {};
				subcategoryForm.form.markAsPristine();
				if(id){
			
					swal({
            position: 'top-end',
            type: 'success',
            title: 'Feedback Sub-Category updated successfully',
            showConfirmButton: false,
            timer: 1500
          })
				} else {
					swal({
            position: 'top-end',
            type: 'success',
            title: 'Feedback Sub-Category added successfully',
            showConfirmButton: false,
            timer: 1500
          })
				}				
				this.router.navigate(['/sub-category/list']);
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
	
	clearForm(subcategoryForm)
	{
		this.subcategoryEntity = {};	
		this.subcategoryEntity.FeedbackCategoryId = 0;
    this.subcategoryEntity.IsActive = '1';
    this.subcategoryEntity.IsReverseAnswer = '0';
    this.subcategoryEntity.ParentId = '';	
		this.submitted = false;
		subcategoryForm.form.markAsPristine();
	}	
	
}



