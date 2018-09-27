import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Globals } from '../globals';
import { DashboardService } from '../services/dashboard.service';
declare var $,PerfectScrollbar,AmCharts : any;

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  constructor(public globals: Globals, private router: Router, private DashboardService: DashboardService) { }
  clientlist;
  status;
  clientlicenses;
  notifications;
  today;
  clientsByMonth;
  licensesByMonth;
  notificationsMonth;
  recentInquiry;

  ngOnInit() {
    this.globals.pageTitle = '- Dashboard';
    this.clientlist = [];
    this.clientlicenses = [];
    this.notifications = [];
    this.notificationsMonth = [];
    this.recentInquiry = [];

    $("footer").addClass("footer_admin");
    if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
        $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
    } else {
		$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
	}
    this.globals.isLoading = true;
    this.DashboardService.getDashboard(this.globals.authData.UserId)
    .then((data) => 
    { 
       this.today = Date.now();
       //console.log(this.today);
       if(data['clients']){
        this.clientlist = data['clients'];
      } 
       this.status = data['status'];

       if(data['clientlicenses']){
        this.clientlicenses = data['clientlicenses'];
      } 

      if(data['notifications']){
        this.notifications = data['notifications'];
      } 

      if(data['notificationsMonth']){
        this.notificationsMonth = data['notificationsMonth'];
      } 

      if(data['recentInquiry']){
        this.recentInquiry = data['recentInquiry'];
      } 
       this.clientsByMonth = data['clientsByMonth'];

       this.licensesByMonth = data['licensesByMonth'];

       var chart = AmCharts.makeChart("clientinvitation_chart", {
        "type": "serial",
        "theme": "none",
      "dataProvider": this.clientsByMonth,
        "valueAxes": [{
            "integersOnly": true,
        "precision" : 0,
            "axisAlpha": 1,
            "dashLength": 0,
            "gridCount": 0,
        "gridAlpha": 0,
            "labelsEnabled": true,
			"axisColor" : "#000",
        "gridThickness": 0,
		"position": "left",
    "title": "No. of Clients"
        }],
        "startDuration": 0,
        "graphs": [{
            "balloonText": "[[month]]<br>Invitation : [[value]]",
            "bullet": "round",
            "title": "",
            "valueField": "value",
        "fillAlphas": 0,
        "precision" : 0,
        "lineColor": "var(--theme-color)",
        "lineThickness": 2,
        "lineAlpha": 1,
        }],
        "chartCursor": {
            "cursorAlpha": 0,
            "zoomable": false,
        "valueZoomable": false,
        "valueLineBalloonEnabled": false,
        "valueLineEnabled": false,
        },
		
        "categoryField": "month",
      "categoryAxis": {
        "gridPosition": "start",
            "axisAlpha": 1,
            "dashLength": 0,
            "gridCount": 0,
        "gridAlpha": 0,
            "labelsEnabled": true,
        "axisColor" : "#000",
		"position": "bottom",
    "title": "Month",
      }
      });

      //INVITATION CHART
      //LICENSE PACK CHART
      var chart = AmCharts.makeChart("licensepack_chart", {
        "type": "serial",
        "theme": "none",
      "dataProvider": this.licensesByMonth,
        "valueAxes": [{
            "integersOnly": true,
        "precision" : 0,
		"axisColor" : "#000",
            "axisAlpha": 1,
            "dashLength": 0,
            "gridCount": 0,
        "gridAlpha": 0,
            "labelsEnabled": true,
        "gridThickness": 0,
		"position": "left",
    "title": "No. of License Pack"
        }],
        "startDuration": 0,
        "graphs": [{
            "balloonText": "[[month]]<br>License Pack : [[value]]",
            "bullet": "round",
            "title": "",
            "valueField": "value",
        "fillAlphas": 0,
        "precision" : 0,
        "lineColor": "var(--theme-color)",
        "lineThickness": 2,
        "lineAlpha": 1,
        }],
        "chartCursor": {
            "cursorAlpha": 0,
            "zoomable": false,
        "valueZoomable": false,
        "valueLineBalloonEnabled": false,
        "valueLineEnabled": false,
        },
		
        "categoryField": "month",
      "categoryAxis": {
        "gridPosition": "start",
        "precision" : 0,
            "axisAlpha": 1,
            "dashLength": 0,
            "gridCount": 0,
        "gridAlpha": 0,
            "labelsEnabled": true,
        "axisColor" : "#000",
		"position": "bottom",
    "title": "Month"
      }
      });
//LICENSE PACK CHART
//LINE CHART END
//LICENSE PACK SELL CHART
var chart = AmCharts.makeChart("licensepack_sell", {
  "type": "serial",
  "theme": "none",
  "dataProvider": [{
    "country": "USA",
    "visits": 3025,
    "color": "#b61110"
  }, {
    "country": "France",
    "visits": 1114,
    "color": "#000000"
  }, {
    "country": "India",
    "visits": 984,
    "color": "#b61110"
  }, {
    "country": "Spain",
    "visits": 711,
    "color": "#000000"
  }, {
    "country": "Netherlands",
    "visits": 665,
    "color": "#b61110"
  }, {
    "country": "Russia",
    "visits": 580,
    "color": "#000000"
  }, {
    "country": "South Korea",
    "visits": 443,
    "color": "#b61110"
  }, {
    "country": "Canada",
    "visits": 441,
    "color": "#000000"
  }],
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
	"gridAlpha": 0,
	"labelsEnabled": false,
    "title": "Total Selling"
  }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
	"axisAlpha": 0,
	"gridPosition": "start",
	"gridAlpha": 0,
	"position": "left",
	"labelsEnabled": false,
	//"position": "bottom",
    "title": "License Packs"
  }
});
//LICENSE PACK SELL CHART END

//OVERALL ANSWER CHART
var chart = AmCharts.makeChart("overall_answer", {
  "type": "pie",
  "startDuration": 0,
   "theme": "none",
  "legend":{
   	"position":"bottom",
  },
  "innerRadius": "30%",
  "dataProvider": [{
    "country": "Always",
    "litres": 50,
	"color": "#6a0000"
  }, {
    "country": "Frequently",
    "litres": 45,
	"color": "#940000"
  }, {
    "country": "Occasionally",
    "litres": 40,
	"color": "#7e7e7e"
  }, {
    "country": "Rarely",
    "litres": 35,
	"color": "#464646"
  }, {
    "country": "Never",
    "litres": 30,
	"color": "#000000"
  }],
  /* "responsive": {
			"enabled": true
			}, */
  "valueField": "litres",
  "titleField": "country",
  "colorField": "color",
  "labelsEnabled": false,
  "autoMargins": false,
  "marginTop": 0,
  "marginBottom": 0,
  "marginLeft": 0,
  "marginRight": 0,
  "pullOutRadius": 0,
});
//OVERALL ANSWER CHART END

//FEEDBACK RATIO CHART
var chart = AmCharts.makeChart( "feedback_ratio", {
  "type": "serial",
  "theme": "none",
  "dataProvider": [ {
    "country": "< 1 Day",
    "visits": 2025,
	"color": "#b61110"
  }, {
    "country": "< 2 Days",
    "visits": 1882,
	"color": "#000000"
  }, {
    "country": "< 4 Days",
    "visits": 1809,
	"color": "#b61110"
  }, {
    "country": "< Week",
    "visits": 1322,
	"color": "#000000"
  }, {
    "country": "Never",
    "visits": 1122,
	"color": "#b61110"
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0,
	"axisAlpha": 0,
	"labelsEnabled": false,
	"position": "left",
    "title": "Users"
	
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
	"fillColorsField": "color",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
	"axisAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20,
	"labelsEnabled": true,
	"position": "bottom",
    "title": "Feedback Completing Days"
  }
} );
//FEEDBACK RATIO CHART END

// PERFECT SCROLLBAR
new PerfectScrollbar('.scroll_notification');
new PerfectScrollbar('.scroll_notification1');
new PerfectScrollbar('.scroll_notification2');
new PerfectScrollbar('.scroll_topclient');
new PerfectScrollbar('.scroll_topclient1');
// END PERFECT SCROLLBAR

   
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
    this.globals.isLoading = false;	
  }, 
  (error) => 
  {
    this.globals.isLoading = false;
    this.router.navigate(['/pagenotfound']);
  });
}

}
