import { Component, OnInit, ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { QuestionService } from '../services/question.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape,swal: any;

@Component({
  selector: 'app-question-list',
  templateUrl: './question-list.component.html',
  styleUrls: ['./question-list.component.css']
})
export class QuestionListComponent implements OnInit {

	questionList;
	deleteEntity;
	msgflag;
	message;
	type;
	permissionEntity;
	
	constructor(private el: ElementRef, private http: Http, private router: Router, private route: ActivatedRoute,
		 private QuestionService: QuestionService, private CommonService: CommonService, public globals: Globals) 
  {
	
  }

  ngOnInit() {
    this.globals.pageTitle = '- Feedback Question';
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
    this.permissionEntity = {}; 
    if(this.globals.authData.RoleId==5){
      this.permissionEntity.View=1;
      this.permissionEntity.AddEdit=1;
      this.permissionEntity.Delete=1;
      this.default();
    } else {		
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Question'})
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
    this.QuestionService.getAll()
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
             "sLengthMenu": "_MENU_ Questions per Page",
             "sInfo": "Showing _START_ to _END_ of _TOTAL_ Questions",
             "sInfoFiltered": "(filtered from _MAX_ total Questions)",
             "sInfoEmpty": "Showing 0 to 0 of 0 Questions"
             },
             dom: 'lBfrtip',
             buttons: [
               
               ]
           });
           
           var buttons = new $.fn.dataTable.Buttons(table, {
           buttons: [
                 {
                 extend: 'excel',
                 title: 'Question List',
                 exportOptions: {
                   columns: [ 0, 1, 2, 3 ]
                   }
                 },
                 {
                 extend: 'print',
                 title: 'Question List',
                 exportOptions: {
                   columns: [ 0, 1, 2, 3 ]
                   }
                 },
               ]
           }).container().appendTo($('#buttons'));
        },100); 
      this.questionList = data;	
      this.globals.isLoading = false;	
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
    }, 
    (error) => 
    {
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
    });
    this.msgflag = false;
   
  }
	
	deleteQuestion(question)
	{ 
    this.deleteEntity = question;
    swal({
      title: 'Are you sure?',
      text: "You want to remove this Question?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    })
    .then((result) => {
      if (result.value) {
    var del={'Userid':this.globals.authData.UserId,'id':question.FeedbackQuestionId};
		this.QuestionService.delete(del)
		.then((data) => 
		{
			let index = this.questionList.indexOf(question);
			$('#Delete_Modal').modal('hide');
			if (index != -1) {
				this.questionList.splice(index, 1);
			}	
      swal({
        position: 'top-end',
        type: 'success',
        title: 'Feedback Question deleted successfully',
        showConfirmButton: false,
        timer: 1500
      })			
		}, 
		(error) => 
		{
			$('#Delete_Modal').modal('hide');
			if(error.text){
			
        swal({
          position: 'top-end',
          type: 'success',
          title: "You can't delete this record because of their dependency",
          showConfirmButton: false,
          timer: 1500
        })			
			}	
    });	
  }}
)	
	}


	isActiveChange(changeEntity, i)
  { 
    if(this.questionList[i].IsActive==1){
      this.questionList[i].IsActive = 0;
      changeEntity.IsActive = 0;
    } else {
      this.questionList[i].IsActive = 1;
      changeEntity.IsActive = 1;
    }
    this.globals.isLoading = true;
    changeEntity.UpdatedBy = this.globals.authData.UserId;
		this.QuestionService.isActiveChange(changeEntity)
		.then((data) => 
		{	      
      this.globals.isLoading = false;	

			swal({
        position: 'top-end',
        type: 'success',
        title:  'Feedback Question updated successfully',
        showConfirmButton: false,
        timer: 1500
      })		
		}, 
		(error) => 
		{
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
		});		
	}
}




