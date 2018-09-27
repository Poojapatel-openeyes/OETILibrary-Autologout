import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { FeedbackService } from '../services/feedback.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,PerfectScrollbar,Tour,tour: any;

@Component({
  selector: 'app-feedback',
  templateUrl: './feedback.component.html',
  styleUrls: ['./feedback.component.css']
})
export class FeedbackComponent implements OnInit {

  categoryList;
  QuestionList;
  totalQuestion;
  percent;
  submit_true;

  constructor(public globals: Globals, private router: Router, 
    private FeedbackService: FeedbackService,private CommonService: CommonService, private route:ActivatedRoute) { }

  ngOnInit() {
    this.globals.isLoading = true;
    this.globals.pageTitle = '- Feedback';
    $("footer").removeClass("footer_admin");
    if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
      $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
  } else {
  $('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
}
	$('.grey_content').removeClass('tour_guide_block');	
	
    //this.globals.isLoading = false;
    this.FeedbackService.getFeedback(this.globals.authData.UserId) 
		.then((data) => 
		{ 	
      if(data=='no'){
        this.globals.isLoading = false;
        //this.router.navigate(['/user/welcome']);
      } else if(data=='score'){
        //this.globals.isLoading = false;
        //this.router.navigate(['/user/result']);
        window.location.href = '/user/result';
      }	else {
        this.categoryList = data['category'];
        this.QuestionList = data['question'];
        this.totalQuestion = data['totalQuestion'];
        this.globals.isLoading = false;
        setTimeout(()=>{  
          $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
			      smoothHeight: true,
            sync: "#carousel"
          });
          this.checkprogress();
          this.globals.isLoading = false;
          if ($("body").height() < $(window).height()) {  
            $('footer').addClass('footer_fixed');  
            //this.globals.isLoading = false;   
          }      
          else{  
              $('footer').removeClass('footer_fixed');    
          }
        },500);
      }      
		}, 
		(error) => 
		{
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);
		});
 new PerfectScrollbar('.scroll_preview');		
  }
  
startTour(){
	$('.grey_content').addClass('tour_guide_block');
	var tour = new Tour({
    smartPlacement: false,
    backdrop: true,
    steps: [{
        element: ".progress",
        placement: 'bottom',
        content: "This will show you the progress of your given answers."
    }, {
        element: ".first_question .content",
        placement: 'bottom',
        content: "These are the questions for which you provide a response."
    }, {
        element: ".first_question .rating",
        placement: 'top',
        content: "For each statement, you will be asked to select one of the five response categories below."
    }, {
        element: ".category_desc",
        placement: 'top',
        content: "This describes the feedback category for the statements you provide a response."
    },
    // {
    //     element: ".flex-next",
    //     placement: 'top',
    //     content: "This will give the next more questions."
    // }, 
    {
        element: "#submit_btn",
        placement: 'top',
        content: "Click on the submit button when you responses are final."
    }
]
});
    tour.init();
    tour.restart();
    tour.start(true);
}


  finalSubmit()
  {	 
    $('#PreviewModal').modal('show');	    	
  }
 
  save(){
    this.globals.isLoading = true;
    this.FeedbackService.submitFeedback({'feedbackId':this.QuestionList[0].row[0].UserFeedbackId,'UserId':this.globals.authData.UserId})
		.then((data) => 
		{
      //this.globals.isLoading = false;
      $('#PreviewModal').modal('hide');	
      //this.router.navigate(['/user/result']);
      window.location.href = '/user/result';
    }, 
		(error) => 
		{
			this.router.navigate(['/pagenotfound']);
		});	
  }

  selectRadio(que){     
    this.FeedbackService.saveQuestion(que)
		.then((data) => 
		{
       this.checkprogress();
    }, 
		(error) => 
		{
			this.router.navigate(['/pagenotfound']);
		});	
  } 

  checkprogress(){ 
    let k = 0; 
      for(let i=0; i<this.QuestionList.length; i++){
        for(let j=0; j<this.QuestionList[i].row.length; j++){
          if(this.QuestionList[i].row[j].FeedbackAnswerId){
            k++;
          }
        }
      }
      let addpro = (100*k)/this.totalQuestion;
	  this.percent = addpro.toFixed(0);
      $('.progress-bar').css("width", addpro+"%");
      if(k==this.totalQuestion){
        this.submit_true = false;
      } else {
        this.submit_true = true;
      }
  }


}
