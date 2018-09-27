import { Component, OnInit,ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { UserscoreService } from '../services/userscore.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare function myInput(): any;
declare var $,unescape: any;
@Component({
  selector: 'app-userscore',
  templateUrl: './userscore.component.html',
  styleUrls: ['./userscore.component.css']
})
export class UserscoreComponent implements OnInit {
scoreList;
permissionEntity;
UserList;
UserEntity;
nodataflag;
  constructor(private el: ElementRef, private http: Http, private router: Router, private route: ActivatedRoute,
		 private UserscoreService: UserscoreService, public globals: Globals, private CommonService: CommonService) { }

  ngOnInit() 
  {
    this.globals.pageTitle = '- User Score';
    this.nodataflag = false;
    this.UserEntity = {};
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
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'user-feedback-score'})
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
    // this.UserscoreService.getAllScore({'RoleId':this.globals.authData.RoleId,'UserId':this.globals.authData.UserId})
    //   .then((data) => 
    //   { 
    //     console.log(data);
    //     this.scoreList = data['category'];
    //     this.UserList = data['user'];
    //     this.globals.isLoading = false; 		
    //     myInput();
    //     setTimeout(function(){
    //       $(".test").removeClass("active");
    //           $(".test").parent().removeClass("in");
    //           $(".userfeedbackscore").parent().addClass("in");
    //           $(".reports").addClass("active"); 
    //           $(".userfeedbackscore").addClass("active");
    //       if ($("body").height() < $(window).height()) {         $('footer').addClass('footer_fixed');       }        else{         $('footer').removeClass('footer_fixed');       }
    //         $('footer').addClass('footer_fixed');
    //       }
    //     },500);



    //         this.globals.isLoading = false;
    //   },
    //   (error) => 
    //   {
    //     this.globals.isLoading = false;
	  //     this.router.navigate(['/pagenotfound']);
    //   });  
    this.UserscoreService.getUserList({'RoleId':this.globals.authData.RoleId,'UserId':this.globals.authData.UserId})
      .then((data) => 
      { 
        this.UserList = data;
        myInput();
        setTimeout(function(){
          $(".test").removeClass("active");
              $(".test").parent().removeClass("in");
              $(".userfeedbackscore").parent().addClass("in");
              $(".reports").addClass("active"); 
              $(".userfeedbackscore").addClass("active");
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
  
  change(){ 
    this.globals.isLoading = true; 
    this.UserscoreService.getScore(this.UserEntity.UserId)
      .then((data) => 
      { 
        if(data=='no'){
          this.scoreList = [];
          this.nodataflag = true;
        } else {
          this.scoreList = data;
          this.nodataflag = false;
        }
        
    this.globals.isLoading = false; 
		
      }, 
      (error) => 
      {
        this.globals.isLoading = false;
	      this.router.navigate(['/pagenotfound']);

      });  
  }

}
