import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CommonService } from '../services/common.service';
import { ForgotpasswordService } from '../services/forgotpassword.service';
declare function myInput(): any;
declare var $: any;

@Component({
  selector: 'app-forgotpassword',
  templateUrl: './forgotpassword.component.html',
  styleUrls: ['./forgotpassword.component.css']
})
export class ForgotpasswordComponent implements OnInit {
	fgpassEntity;
	submitted;
	type;
	btn_disable;
	Company;
  company_workspace;
  
 constructor(public globals: Globals, private router: Router,private CommonService : CommonService,private route:ActivatedRoute,private ForgotpasswordService:ForgotpasswordService) { }

  ngOnInit() {
		this.globals.pageTitle = '- Forgot Password';
		if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
      $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
  } else {
  $('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
}
		let company_workspace = this.route.snapshot.paramMap.get('name'); 
    this.company_workspace = '';
		this.Company = {};
    if(company_workspace){
      this.company_workspace = company_workspace;
      this.globals.isLoading = true; 
      this.CommonService.getCompanyDetails({'company':company_workspace})
      .then((data) => 
      { 
        this.globals.isLoading = false;
        if(data=='error'){
          this.router.navigate(['/pagenotfound']);
        }
				this.Company = data; 
				if(this.Company.Favicon){
          $("#favicon").attr("href",'assets/company/'+this.Company.Favicon);
        } 
				const body = document.querySelector('body')
        const inputs = [].slice.call(document.querySelectorAll('input'));
        body.style.setProperty('--theme-color', this.Company.ThemeCode)       
      },
      (error) => 
      {
        this.globals.isLoading = false;
        this.router.navigate(['/pagenotfound']);
      });	
    }    
		myInput();
		$("body").addClass("height_100");
		this.globals.isLoading = false;
		this.globals.msgflag = false;
	  this.fgpassEntity={};
  }  
  
  Forgot(fgpassForm)
	{		
	  var msg=this.fgpassEntity.EmailAddress;		
		this.submitted = true;		
		if(fgpassForm.valid){	
			this.btn_disable = true;
			this.globals.isLoading = true;
			let WorkspaceURL = '';
			if(this.company_workspace){
				WorkspaceURL = this.company_workspace;
			} else {
				WorkspaceURL = null;
			}	
			this.ForgotpasswordService.forgot({'EmailAddress':this.fgpassEntity.EmailAddress,'WorkspaceURL':WorkspaceURL})
			.then((data) => 
			{				
				if(data=='Email not exist')
				{
						this.globals.message = "Email Address doesn't exist. Enter a different Email Address or get a new one";
						this.globals.type = 'danger';
						this.globals.isLoading = false;
						this.globals.msgflag = true;
						this.btn_disable = false;
						this.submitted = false;
				}else
				{
					this.btn_disable = false;
					this.submitted = false;
					this.fgpassEntity = {};
					fgpassForm.form.markAsPristine();
					this.globals.isLoading = false;
					this.globals.message = 'An Email with a password reset link was just sent to <b>' + msg +'</b>';
					this.globals.type = 'success';
					this.globals.msgflag = true;
				}
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
    
}
