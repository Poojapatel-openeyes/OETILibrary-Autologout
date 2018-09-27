import { Component, OnInit, ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { AnswerService } from '../services/answer.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape,swal	: any;

@Component({
  selector: 'app-answer-list',
  templateUrl: './answer-list.component.html',
  styleUrls: ['./answer-list.component.css']
})
export class AnswerListComponent implements OnInit {

	answerList;
	deleteEntity;
	msgflag;
	message;
	type;
	permissionEntity;
	
	constructor(private el: ElementRef, private http: Http, private router: Router, private route: ActivatedRoute,
		 private AnswerService: AnswerService, private CommonService: CommonService, public globals: Globals) 
  {
	
  }

  ngOnInit() {
    this.globals.pageTitle = '- Feedback Answer';
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
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Answer'})
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
    this.AnswerService.getAll()
    .then((data) => 
    { 
      setTimeout(function(){
        var table = $('#list_tables').DataTable( {
        //  scrollY: '55vh',
		 responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
           scrollCollapse: true,           
             "oLanguage": {
             "sLengthMenu": "_MENU_ Answers per Page",
             "sInfo": "Showing _START_ to _END_ of _TOTAL_ Answers",
             "sInfoFiltered": "(filtered from _MAX_ total Answers)",
             "sInfoEmpty": "Showing 0 to 0 of 0 Answers"
             },
             dom: 'lBfrtip',
             buttons: [
               
               ]
           });
           
           var buttons = new $.fn.dataTable.Buttons(table, {
           buttons: [
                 {
                 extend: 'excel',
                 title: 'Answer List',
                 exportOptions: {
                   columns: [ 0, 1, 2, 3 ]
                   }
                 },
                 {
                 extend: 'print',
                 title: 'Answer List',
                 exportOptions: {
                   columns: [ 0, 1, 2, 3 ]
                   }
                 },
               ]
           }).container().appendTo($('#buttons'));
        },100); 
      this.answerList = data;	
      this.globals.isLoading = false;	
    }, 
    (error) => 
    {
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
    });
    this.msgflag = false;
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
	
	deleteanswer(answer)
	{ 
		this.deleteEntity =  answer;
		swal({
      title: 'Are you sure?',
      text: "you want to remove this Answer?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    })	
    .then((result) => {
      if (result.value) {
        var del={'Userid':this.globals.authData.UserId,'id':answer.FeedbackAnswerId};
        this.AnswerService.delete(del)
        .then((data) => 
        {
          let index = this.answerList.indexOf(answer);
        //  $('#Delete_Modal').modal('hide');
          if (index != -1) {
            this.answerList.splice(index, 1);
          }	
          swal({
						position: 'top-end',
						type: 'success',
						title: 'Answer deleted successfully',
						showConfirmButton: false,
						timer: 1500
					})	
        }, 
        (error) => 
        {
      //    $('#Delete_Modal').modal('hide');
          if(error.text){
            swal({
              position: 'top-end',
              type: 'danger',
              title: "You can't delete this record because of their dependency!",
              showConfirmButton: false,
              timer: 1500
            })	
          }	
        });		
      }	
    })			
	}

	deleteConfirm(answer)
	{ var del={'Userid':this.globals.authData.UserId,'id':answer.FeedbackAnswerId};
		this.AnswerService.delete(del)
		.then((data) => 
		{
			let index = this.answerList.indexOf(answer);
			$('#Delete_Modal').modal('hide');
			if (index != -1) {
				this.answerList.splice(index, 1);
			}	
			this.globals.message = 'Answer deleted successfully';
			this.globals.type = 'success';
			this.globals.msgflag = true;			
		}, 
		(error) => 
		{
			$('#Delete_Modal').modal('hide');
			if(error.text){
				this.globals.message = "You can't delete this record because of their dependency!";
				this.globals.type = 'danger';
				this.globals.msgflag = true;
			}	
		});		
  }
  
	isActiveChange(changeEntity, i)
  { 
    if(this.answerList[i].IsActive==1){
      this.answerList[i].IsActive = 0;
      changeEntity.IsActive = 0;
    } else {
      this.answerList[i].IsActive = 1;
      changeEntity.IsActive = 1;
    }
    this.globals.isLoading = true;
    changeEntity.UpdatedBy = this.globals.authData.UserId;
		this.AnswerService.isActiveChange(changeEntity)
		.then((data) => 
		{	      
      this.globals.isLoading = false;	

      swal({
        position: 'top-end',
        type: 'success',
        title: 'Answer updated successfully' ,
        showConfirmButton: false,
        timer: 5000
      })		
		}, 
		(error) => 
		{
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
		});		
	}
}



