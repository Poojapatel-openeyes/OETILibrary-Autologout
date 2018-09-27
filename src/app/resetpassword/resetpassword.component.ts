import { Component, OnInit } from '@angular/core';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { ResetpasswordService } from '../services/resetpassword.service';
import { CommonService } from '../services/common.service';
import { JwtHelper } from 'angular2-jwt';
declare function myInput(): any;
declare var $,swal: any;

@Component({
  selector: 'app-resetpassword',
  templateUrl: './resetpassword.component.html',
  styleUrls: ['./resetpassword.component.css']
})
export class ResetpasswordComponent implements OnInit {
	resetEntity;
	submitted;
	btn_disable;
	header;
  same;
  company_workspace;
  Company;

   constructor(public globals: Globals,private CommonService : CommonService,private router: Router,private route:ActivatedRoute,private ResetpasswordService:ResetpasswordService) { }


  ngOnInit() { debugger
    this.globals.pageTitle = '- Reset Password';
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
    this.globals.isLoading = true;	   
    this.resetEntity={};
    let id = this.route.snapshot.paramMap.get('id');
    id=new JwtHelper().decodeToken(id);
    this.ResetpasswordService.getResetlink(id)
    .then((data) => 
    { 
      if(data=='fail'){
     
        swal({
          type: 'warning',
          title: 'Oops...',
          text: 'You are already used this link',
          
          })
        this.router.navigate(['/login']);
      } 
      this.globals.isLoading = false;
    }, 
    (error) => 
    {
      this.btn_disable = false;
      this.submitted = false;
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
    });	

  }
  
  addPassword(resetForm)
  {	debugger
	let id = this.route.snapshot.paramMap.get('id');		
	var id1=new JwtHelper().decodeToken(id);	
  this.globals.isLoading = true;
	this.resetEntity.UserId = id1.UserId;
  this.submitted = true;
		if(resetForm.valid && !this.same)
		{
			this.btn_disable = true;
			this.ResetpasswordService.reset(this.resetEntity)
			.then((data) => 
			{
        this.globals.message = 'Your Password changed successfully';
        swal({
          position: 'top-end',
          type: 'success',
          title: 'Your Password changed successfully',
          showConfirmButton: false,
          timer: 5000
        })
        this.globals.isLoading = false;
        this.submitted = false;
        this.resetEntity = {};
        resetForm.form.markAsPristine();
        let company_workspace = this.route.snapshot.paramMap.get('name'); 
        if(company_workspace){
          this.router.navigate(['/'+company_workspace+'/login/']);
        } else {
          this.router.navigate(['/login/']);
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
	
	 checkpassword(){ 
		if(this.resetEntity.cPassword != this.resetEntity.Password){
			this.same = true;
		} else {
			this.same = false;
		}		
	}
  
}
