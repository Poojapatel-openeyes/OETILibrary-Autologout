import { Component, OnInit, ElementRef } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { AnswerService } from '../services/answer.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,swal: any;
declare function myInput(): any;

@Component({
  selector: 'app-answer',
  templateUrl: './answer.component.html',
  styleUrls: ['./answer.component.css']
})

export class AnswerComponent implements OnInit 
{
	answerEntity;
	submitted;
	btn_disable;
	header;
	
  constructor(private el: ElementRef, private router: Router, private route: ActivatedRoute, private AnswerService: AnswerService, public globals: Globals, private CommonService:CommonService)
    {		
	  }
  ngOnInit() 
  { 
    this.globals.pageTitle = '-Feedback Answers';
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
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Answer'})
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
    this.answerEntity = {};
    let id = this.route.snapshot.paramMap.get('id');
    this.globals.msgflag = false;
    if(id){
      this.header = 'Edit';
      this.AnswerService.getById(id)
      .then((data) => 
      { 
        if(data!=""){
          this.answerEntity = data;
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
      this.answerEntity = {};
      this.answerEntity.FeedbackAnswerId = 0;
      this.answerEntity.IsActive = '1';
      this.globals.isLoading = false;	
      myInput();	
    }	
    setTimeout(function(){
      $(".test").removeClass("active");
      $(".test").parent().removeClass("in");
      $(".answer").parent().addClass("in");
      $(".managecontent").addClass("active"); 
      $(".answer").addClass("active");	
      if ($("body").height() < $(window).height()) {  
        $('footer').addClass('footer_fixed');     
    }      
    else{  
        $('footer').removeClass('footer_fixed');    
    }
		},500);
  }
	
	addanswer(answerForm)
	{		
		let id = this.route.snapshot.paramMap.get('id');
		if(id){			
			this.answerEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {			
			this.answerEntity.CreatedBy = this.globals.authData.UserId;
			this.answerEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = true;
		}
		if(answerForm.valid){
			this.btn_disable = true;
			this.AnswerService.add(this.answerEntity)
			.then((data) => 
			{
				this.btn_disable = false;
				this.submitted = false;
				this.answerEntity = {};
				answerForm.form.markAsPristine();
				if(id){
          swal({
            position: 'top-end',
            type: 'success',
            title: 'Feedback Answer updated successfully',
            showConfirmButton: false,
            timer: 1500
            })
				} else {
          swal({
            position: 'top-end',
            type: 'success',
            title: 'Feedback Answer added successfully',
            showConfirmButton: false,
            timer: 1500
            })
				}				
				this.router.navigate(['/answer/list']);
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
	
	clearForm(answerForm)
	{
		this.answerEntity = {};	
		this.answerEntity.FeedbackAnswerId = 0;
    this.answerEntity.IsActive = '1';	
		this.submitted = false;
		answerForm.form.markAsPristine();
	}	
	
}



