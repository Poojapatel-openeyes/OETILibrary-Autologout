import { Component, OnInit } from '@angular/core';
import { AuthService } from '../services/auth.service';
import { CommonService } from '../services/common.service';
import { Router } from '@angular/router';
import { Globals } from '../globals';
declare var $: any;

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  constructor(private authService: AuthService,private router: Router,public globals: Globals,private CommonService: CommonService) { }
  firstNameChar;
  lastNameChar;
  company_workspace;
  Company;

  ngOnInit() { 
    this.firstNameChar = this.globals.authData.FirstName.slice(0,1);
    this.lastNameChar = this.globals.authData.LastName.slice(0,1);
    let company = localStorage.getItem('company');
    this.company_workspace = '';
    if(company && (this.globals.authData.RoleId==3 || this.globals.authData.RoleId==4)){ 
      this.company_workspace = company;
      this.CommonService.getCompanyDetails({'company':company})
      .then((data) => 
      {         
        this.Company = data;
        if(this.Company.Favicon){
          $("#favicon").attr("href",'assets/company/'+this.Company.Favicon);
        }  
        this.globals.isLoading = false;

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
   
  }

  logout()
    { 
      this.globals.isLoading = true;
      this.authService.logout(this.globals.authData.UserId)
      .then((data) => 
      { 
        //this.globals.isLoading = false;
        //this.router.navigate(['/login']); 
        let company = localStorage.getItem('company');
        if(company){
          localStorage.removeItem('company');
          window.location.href = '/'+company+'/login';  
        } else {
          window.location.href = '/login';  
        }
      }, 
      (error) => 
      {
        this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
      });
          
    }

}
