import { Component, OnInit, ElementRef } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { QuestionService } from '../services/question.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,swal: any;
declare function myInput(): any;

@Component({
  selector: 'app-question',
  templateUrl: './question.component.html',
  styleUrls: ['./question.component.css']
})

export class QuestionComponent implements OnInit 
{
	questionEntity;
	submitted;
	btn_disable;
  header;
  catList;
  answerList;
	
  constructor(private el: ElementRef, private router: Router, private route: ActivatedRoute, private QuestionService: QuestionService, public globals: Globals, private CommonService:CommonService)
    {		
    }
    
  ngOnInit() 
  { 
    this.globals.pageTitle = '- Feedback Question';
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
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Question'})
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
    this.questionEntity = {};
    let id = this.route.snapshot.paramMap.get('id');
    this.globals.msgflag = false;

    this.QuestionService.getDataList()
			.then((data) => {
        this.catList = data['cat'];
        if(id){
        } else {          
          this.answerList = data['answer'];
          this.questionEntity.FeedbackAnswerId = this.answerList;
        }       
        this.globals.isLoading = false;        
			},
			(error) => {
        this.globals.isLoading = false;	
        this.router.navigate(['/pagenotfound']);
      });
      
    if(id){
      this.header = 'Edit';
      this.QuestionService.getById(id)
      .then((data) => 
      { 
        if(data!=""){
          this.questionEntity = data;
          this.answerList = this.questionEntity.FeedbackAnswerId;
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
      this.questionEntity = {};
      this.questionEntity.FeedbackCategoryId = '';
      this.questionEntity.FeedbackQuestionId = 0;
      this.questionEntity.IsActive = '1';
      this.questionEntity.CustomAnswer = '0';
      this.globals.isLoading = false;	
      myInput();	
    }	
    setTimeout(function(){
      $(".test").removeClass("active");
      $(".test").parent().removeClass("in");
      $(".question").parent().addClass("in");
      $(".managecontent").addClass("active"); 
      $(".question").addClass("active");	
      if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
			}      
			else{  
				$('footer').removeClass('footer_fixed');    
			}
		},500);
  }

  changeCheckbox(i) {
    if(this.answerList[i].checked=='true'){
      this.answerList[i].checked = 'false';
    } else {
      this.answerList[i].checked = 'true';
    }
  }
	
	addQuestion(questionForm)
	{	
		let id = this.route.snapshot.paramMap.get('id');
		if(id){			
			this.questionEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {			
			this.questionEntity.CreatedBy = this.globals.authData.UserId;
			this.questionEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = true;
		}
		if(questionForm.valid){
			this.btn_disable = true;
			this.QuestionService.add(this.questionEntity)
			.then((data) => 
			{
				this.btn_disable = false;
				this.submitted = false;
				this.questionEntity = {};
				questionForm.form.markAsPristine();
				if(id){
	
					swal({
            position: 'top-end',
            type: 'success',
            title: 'Feedback Question updated successfully',
            showConfirmButton: false,
            timer: 1500
          })
				} else {
		
						swal({
            position: 'top-end',
            type: 'success',
            title: 'Feedback Question added successfully',
            showConfirmButton: false,
            timer: 1500
          })
				}				
				this.router.navigate(['/question/list']);
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
	
	clearForm(questionForm)
	{
		this.questionEntity = {};	
		this.questionEntity.FeedbackQuestionId = 0;
    this.questionEntity.IsActive = '1';
    this.questionEntity.CustomAnswer = '0';
    this.questionEntity.IsReverseAnswer = '0';
    this.questionEntity.FeedbackCategoryId = '';	
		this.submitted = false;
		questionForm.form.markAsPristine();
	}	
	
}




