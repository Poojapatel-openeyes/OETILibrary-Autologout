import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { FeedbackService } from '../services/feedback.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $, Tour,tour: any;

@Component({
  selector: 'app-user-welcome',
  templateUrl: './user-welcome.component.html',
  styleUrls: ['./user-welcome.component.css']
})
export class UserWelcomeComponent implements OnInit {

  constructor(public globals: Globals, private router: Router, 
    private FeedbackService: FeedbackService,private CommonService: CommonService, private route:ActivatedRoute) { }

  ngOnInit() {
    this.globals.pageTitle = '- Welcome';
    $("footer").removeClass("footer_admin");
	
	if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
		$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
	} else {
	$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
  }

    this.globals.isLoading = true;
    this.FeedbackService.checkFBstart(this.globals.authData.UserId)
		.then((data) => 
		{ 
      this.globals.isLoading = false;
      if(data=='yes'){      
        this.router.navigate(['/user/result']);
      }         
		}, 
		(error) => 
		{
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);
		});
  }
  // Instance the tour


startTour(){
	var tour = new Tour({
    smartPlacement: false, // does NOT work every time
    backdrop: true,
    steps: [{
        element: ".progress",
        placement: 'top',
        title: "Progress",
        content: "This will show you the progress of your given answers."
    }, {
        element: "#contentQues",
        placement: 'bottom',
        title: "Question",
        content: "These are the questions for which you need to give feedback."
    }, {
        element: "#ratingAns",
        placement: 'left',
        title: "Rating",
        content: "These are the four feedback which you to select one."
    }, {
        element: ".category_desc",
        placement: 'top',
        title: "Description",
        content: "This will show you the description of all Feedback Categories."
    },{
        element: ".flex-next",
        placement: 'top',
        title: "Next	",
        content: "This will give the next more questions."
    }, {
        element: "#submit_btn",
        placement: 'top',
        title: "Submit",
        content: "Click on this when you have given all feedbacks."
    }
]
});
	
    // Initialize the tour
    tour.init();
    // Restart from begining
    tour.restart();
    // Start the tour
    tour.start(true);
}

  startFeedback(){
    this.globals.isLoading = true;
    this.FeedbackService.startFeedback(this.globals.authData.UserId)
		.then((data) => 
		{ 		
      this.globals.isLoading = false;
      //this.router.navigate(['/user/feedback']);
      window.location.href = '/user/feedback';
		}, 
		(error) => 
		{
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);
		});	
  }

}
