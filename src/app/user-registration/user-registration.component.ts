import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { Globals } from '../globals';
import { CommonService } from '../services/common.service';
import { UserRegistrationService } from '../services/user-registration.service';
import { JwtHelper } from 'angular2-jwt';
declare var $: any;
declare function myInput(): any;

@Component({
  selector: 'app-user-registration',
  templateUrl: './user-registration.component.html',
  styleUrls: ['./user-registration.component.css']
})
export class UserRegistrationComponent implements OnInit {
  UserRegisterEntity;
  submitted;
  btn_disable;
  CountryList;
  stateList;
	same;
	company_workspace;
  Company;

  constructor(private router: Router, private route: ActivatedRoute,private CommonService : CommonService,private UserRegistrationService: UserRegistrationService, public globals: Globals) { }

  ngOnInit() {
		this.globals.pageTitle = '- Register';
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
				setTimeout(function(){
				myInput();
			},100);
      },
      (error) => 
      {
        this.globals.isLoading = false;
        this.router.navigate(['/pagenotfound']);
      });
    }	
	 
	 $("body").addClass("height_100");
	 let id = this.route.snapshot.paramMap.get('id');
    id=new JwtHelper().decodeToken(id);
    this.UserRegisterEntity = {};
    this.UserRegisterEntity.CountryId ='';
		this.UserRegisterEntity.StateId ='';

  this.UserRegistrationService.getAllData(id)
	.then((data) => 
	{ 
		if(data=='wrong code'){
			this.globals.isLoading = false;
			let company_workspace = this.route.snapshot.paramMap.get('name'); 
			if(company_workspace){
				this.router.navigate(['/'+company_workspace+'/login/']);
			} else {
				this.router.navigate(['/login/']);
			} 
		}
		this.UserRegisterEntity.EmailAddress = data['user']['EmailAddress'];
		this.UserRegisterEntity.UserId = data['user']['UserId'];
		this.UserRegisterEntity.RoleId = data['user']['RoleId'];
		this.UserRegisterEntity.ParentId = data['user']['ParentId'];
		setTimeout(function(){
			myInput();
		},100);
	}, 
	(error) => 
	{
		this.globals.isLoading = false;
		this.router.navigate(['/pagenotfound']);
	});
  }
  updateUser(UserRegisterForm){
    this.submitted = true;
		if(UserRegisterForm.valid){
      
      this.btn_disable = true;
			this.globals.isLoading = true;
			this.UserRegistrationService.updateUser(this.UserRegisterEntity)
			.then((data) => 
			{	
				this.globals.isLoading = false;
        this.btn_disable = false;
				this.submitted = false;
        this.UserRegisterEntity = {};
				UserRegisterForm.form.markAsPristine();   
				//this.router.navigate(['/dashboard']);	
				window.location.href = '/user/welcome	';
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
		if(this.UserRegisterEntity.cPassword != this.UserRegisterEntity.Password){
			this.same = true;
		} else {
			this.same = false;
		}
		
	}
}
