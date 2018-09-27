import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { AuthService } from '../services/auth.service';
import { CommonService } from '../services/common.service';
import { ClientInviteService } from '../services/client-invite.service';
import { Globals } from '../globals';
import { JwtHelper } from 'angular2-jwt';
declare function myInput(): any;
declare var $,substrRegex,swal: any;

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  loginEntity;
  submitted;
  submitted1;
  btn_disable;
  open_register;
  comapnyEntity;
  Company;
  company_workspace;
  CompanyList;
  check_url;
   
  constructor(private router: Router, private route: ActivatedRoute,private CommonService : CommonService,private ClientInviteService: ClientInviteService, private AuthService : AuthService,public globals: Globals) { }
  

  ngOnInit() {
    this.globals.pageTitle = '- Login';
    this.check_url = false;
    if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
      $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
  } else {
  $('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
}
    let company_workspace = this.route.snapshot.paramMap.get('name'); 
    this.company_workspace = '';
    this.comapnyEntity = {};
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
    }  else {
      this.CommonService.getCompanyList()
      .then((data) => 
      { 
        this.globals.isLoading = false;
        this.CompanyList = data;
        var substringMatcher = function(strs) {
          return function findMatches(q, cb) {
            var matches, substringRegex;        
            // an array that will be populated with substring matches
            matches = [];        
            // regex used to determine if a string contains the substring `q`
            let substrRegex = new RegExp(q, 'i');        
            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function(i, str) {
              if (substrRegex.test(str)) {
                matches.push(str);
              }
            });        
            cb(matches);
          };
        };
        var states = this.CompanyList;    
        $('.autocomplete').typeahead({
          hint: true,
          highlight: true,
          minLength: 1
        },
        {
          name: 'states',
          source: substringMatcher(states)
        }); 
      },
      (error) => 
      {
        this.globals.isLoading = false;
        this.router.navigate(['/pagenotfound']);
      });	
    }   

    myInput();
    $("body").addClass("height_100");
    this.globals.msgflag = false;
	  this.globals.isLoading = false;	
    this.loginEntity={};
    this.ClientInviteService.check_openRegister()
    .then((data) => 
    {
      this.open_register = data['Value'];
      this.globals.isLoading = false;
    },
    (error) => 
    {
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
    });	
  }

  gotoPortal()
	{ 
    $('#name').removeClass('filled');
		$('#name').parents('.form-group').removeClass('focused'); 
		$('#company').modal('show');	
  }

  noForm(companyForm) { 
    this.comapnyEntity = {};
    this.submitted1 = false;
		companyForm.form.markAsPristine();
  }
  
  goConfirm(companyForm){
    this.submitted1 = true;
    this.comapnyEntity.name = $('#name').val();
		if (companyForm.valid) {
      this.submitted1 = false;
      this.globals.isLoading = true;
      debugger
      this.CommonService.check_workspace_url(this.comapnyEntity)
    .then((data) => 
    { debugger
      if(data=='no'){
        this.check_url = true;
        this.globals.isLoading = false;
      } else {
        this.check_url = false;
        window.location.href = '/'+this.comapnyEntity.name+'/login';
      }          
    },
    (error) => 
    {
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
    });	      
    }
  }
  
   login(loginForm)
	 {		
		this.submitted = true;
		if(loginForm.valid){
			this.btn_disable = true;
      this.globals.isLoading = true;
      let company_workspace = this.route.snapshot.paramMap.get('name'); 
      if(company_workspace){
        this.loginEntity.WorkspaceURL = company_workspace;
      } else {
        this.loginEntity.WorkspaceURL = null;
      }       
			this.AuthService.login(this.loginEntity)
			.then((data) => 
			{
        this.btn_disable = false;
        this.submitted = false;
        this.loginEntity = {};
        loginForm.form.markAsPristine(); 
        if(company_workspace){
          localStorage.setItem('company',company_workspace);	
        }        	 
        if(this.globals.authData.RoleId==4){ debugger
          //this.router.navigate(['/user/feedback']);	
          window.location.href = '/user/feedback';
        } else {
          this.router.navigate(['/dashboard']);	
        }            
			}, 
			(error) => 
			{ 
    
          swal({
            type: 'warning',
            title: 'Oops...',
            text: 'Either username or password is incorrect',
            
            })
          this.globals.isLoading = false;
         
          this.btn_disable = false;
          this.submitted = false;
			});
		} 		
	}

}
