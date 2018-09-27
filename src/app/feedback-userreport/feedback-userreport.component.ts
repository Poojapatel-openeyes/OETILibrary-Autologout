import { Component, OnInit, ElementRef } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { FeedbackUserreportService } from '../services/feedback-userreport.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape	: any;

@Component({
  selector: 'app-feedback-userreport',
  templateUrl: './feedback-userreport.component.html',
  styleUrls: ['./feedback-userreport.component.css']
})
export class FeedbackUserreportComponent implements OnInit {
  feedbackList;
  ScoreList;
  permissionEntity;
  constructor(private el: ElementRef, private router: Router, private route: ActivatedRoute,
    private FeedbackUserreportService: FeedbackUserreportService, private CommonService: CommonService, public globals: Globals) 
 { }

  ngOnInit() {
    this.globals.pageTitle = '- User Feedback Report';
    $("footer").addClass("footer_admin");
    if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
      $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
  } else {
  $('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
}
    this.globals.isLoading = true;
    this.permissionEntity = {}; 
    if(this.globals.authData.RoleId==5){
      this.permissionEntity.View=1;
      this.permissionEntity.AddEdit=1;
      this.permissionEntity.Delete=1;
      this.default();
    } else {		
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'user-feedback-report'})
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
    this.FeedbackUserreportService.getAll({roleid:this.globals.authData.RoleId,userid:this.globals.authData.UserId})
    .then((data) => 
    { 
      setTimeout(function(){
        var table = $('#list_tables').DataTable( {
          //scrollY: '55vh',
		   responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
             scrollCollapse: true,           
               "oLanguage": {
                 "sLengthMenu": "_MENU_ Users Feedback per Page",
                 "sInfo": "Showing _START_ to _END_ of _TOTAL_ Users Feedback",
                 "sInfoFiltered": "(filtered from _MAX_ total Users Feedback)",
                 "sInfoEmpty": "Showing 0 to 0 of 0 Users Feedback"
               },
               dom: 'lBfrtip',
               buttons: [
                     
                   ]
             });
             
             var buttons = new $.fn.dataTable.Buttons(table, {
             buttons: [
                         {
                         extend: 'excel',
                         title: 'User Feedback List',
                         exportOptions: {
                           columns: [ 0, 1, 2, 3 ]
                           }
                         },
                         {
                         extend: 'print',
                         title: 'User Feedback List',
                         exportOptions: {
                           columns: [ 0, 1, 2, 3 ]
                           }
                         },
                     ]
           }).container().appendTo($('#buttons'));
      },100); 
      this.feedbackList = data;	
      this.globals.isLoading = false;	
    }, 
    (error) => 
    {
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
    });
    setTimeout(function(){
      $(".test").removeClass("active");
      $(".test").parent().removeClass("in");
      $(".userfeedbackreport").parent().addClass("in");
      $(".reports").addClass("active"); 
      $(".userfeedbackreport").addClass("active");
      if ($("body").height() < $(window).height()) {  
        $('footer').addClass('footer_fixed');     
      }      
      else{  
        $('footer').removeClass('footer_fixed');    
      }
		},500);
  }
  openModel(UserId)
  {	  
    this.FeedbackUserreportService.getUserScore(UserId)
    .then((data) => 
    { 
      this.ScoreList = data;
      this.globals.isLoading = false;	
      $('#PreviewModal').modal('show');	  
    }, 
    (error) => 
    {
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
    });
     	
  }

}
