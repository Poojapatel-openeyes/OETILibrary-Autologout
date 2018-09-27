import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { DashboardService } from '../services/dashboard.service';
import { Globals } from '../globals';
declare var $,AmCharts : any;
@Component({
  selector: 'app-client-dashboard',
  templateUrl: './client-dashboard.component.html',
  styleUrls: ['./client-dashboard.component.css']
})
export class ClientDashboardComponent implements OnInit {

  constructor(public globals: Globals, private router: Router, private DashboardService: DashboardService) { }

  userlist;
  status;
  feedbacklist;
  registered_user;
  total_feedback;
  today_feedback;
  total_licenses;
  remaining_licenses;
  assign_licenses;
  incomplete_feedback;
  //totalCFeedback;

  ngOnInit() {
    this.globals.pageTitle = '- Dashboard';
    this.feedbacklist = [];
    this.userlist = [];
    $("footer").addClass("footer_admin");
    if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
      $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
  } else {
  $('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
}
    this.globals.isLoading = true;
    this.DashboardService.getClientDashboard(this.globals.authData.UserId)
    .then((data) => 
    { 
      if(data['users']){
        this.userlist = data['users'];
      } 
      this.status = data['status'];
      if(data['feedbacks']){
        this.feedbacklist = data['feedbacks'];
      }      
      this.registered_user = data['registered_user'];
      this.total_feedback = data['total_feedback'];
      this.today_feedback = data['today_feedback'];
      this.incomplete_feedback = data['incomplete_feedback'];
      this.total_licenses = data['total_licenses'];
      this.remaining_licenses = data['remaining_licenses'];
      if(!this.total_licenses){
        this.total_licenses = 0;
      }
      if(!this.remaining_licenses){
        this.remaining_licenses = 0;
      }
      this.assign_licenses = this.total_licenses - this.remaining_licenses;
      this.globals.isLoading = false;

      var chart = AmCharts.makeChart( "feedback_chart", {
        "type": "pie",
        "startDuration": 0,
        "dataProvider": [ {
          "title": "Completed Feedback",
          "value": this.total_feedback,
          "color": "#222"
        }, {
          "title": "Incompleted Feedback",
          "value": (this.registered_user - this.total_feedback),
          "color": "var(--theme-color)"
        } ],
		
        "titleField": "title",
        "valueField": "value",
        "labelRadius": 5,
      "colorField": "color",
        "radius": "42%",
        "innerRadius": "70%",
        "labelText": "[[title]]",
		"responsive": {
			"enabled": true
			},
        "export": {
          "enabled": true
        }
      });
      var chart = AmCharts.makeChart( "license_chart", {
        "type": "pie",
        "startDuration": 0,
        "dataProvider": [ {
          "title": "Remaining Licenses",
          "value": this.remaining_licenses,
          "color": "var(--theme-color)"
        }, {
          "title": "Assigned Licenses",
          "value": this.assign_licenses,
          "color": "#222"
        } ],
		
        "titleField": "title",
        "valueField": "value",
        "labelRadius": 5,
      "colorField": "color",
        "radius": "42%",
        "innerRadius": "70%",
        "labelText": "[[title]]",
		"responsive": {
			"enabled": true
			},
        "export": {
          "enabled": true
        }
      });
      setTimeout(function(){
        $(".test").removeClass("active");
        $(".dropdown-toggle ").addClass("collapsed");
        $(".dropdown-toggle ").attr("aria-expanded","false");
        $(".test").parent().removeClass("in");
        $("#dash").addClass("active");
        if ($("body").height() < $(window).height()) {  
					$('footer').addClass('footer_fixed');     
			}      
			else{  
					$('footer').removeClass('footer_fixed');    
			}
      },500);
    }, 
    (error) => 
    {
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
    });
  }

}
