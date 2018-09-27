import { Component, OnInit, ElementRef } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { Globals } from '../globals';
import { CommonService } from '../services/common.service';
import { EditprofileService } from '../services/editprofile.service';
import { ClientRegistrationService } from '../services/client-registration.service';
import { JwtHelper } from 'angular2-jwt';
declare var $: any;
declare function myInput(): any;

@Component({
  selector: 'app-client-registration',
  templateUrl: './client-registration.component.html',
  styleUrls: ['./client-registration.component.css']
})
export class ClientRegistrationComponent implements OnInit {
	ClientRegisterEntity;
	CompanyEntity;
	submitted;
	btn_disable;
	CountryList;
	stateList;
	same;
	reg_form;
	selectedFile: File;
	filename: File;
	selectedFavicon: File;
	company_workspace;
  	Company;


  constructor(private router: Router, private route: ActivatedRoute,private EditprofileService: EditprofileService,private CommonService : CommonService,private ClientRegistrationService: ClientRegistrationService, public globals: Globals, private elem: ElementRef) { }

  ngOnInit() {debugger
	this.globals.pageTitle = '- Client Register';
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
		myInput();	
      },
      (error) => 
      {
        this.globals.isLoading = false;
        this.router.navigate(['/pagenotfound']);
      });
    }	
	 
	 $("body").addClass("height_100");
	 this.reg_form = true;
	 let id = this.route.snapshot.paramMap.get('id');
    id=new JwtHelper().decodeToken(id);
		this.ClientRegisterEntity = {};
		this.CompanyEntity = {};
    this.ClientRegisterEntity.CountryId ='';
		this.ClientRegisterEntity.StateId ='';

  this.ClientRegistrationService.getAllData(id)
	.then((data) => 
	{ //console.log(data);
		if(data=='wrong code'){
			this.globals.isLoading = false;
			this.globals.message = 'This Client registration link is invalid.';
			this.globals.type = 'danger';
			this.globals.msgflag = true;
			let company_workspace = this.route.snapshot.paramMap.get('name'); 
			if(company_workspace){
				this.router.navigate(['/'+company_workspace+'/login/']);
			} else {
				this.router.navigate(['/login/']);
			} 
		}
		this.CountryList = data['country'];
		this.ClientRegisterEntity.EmailAddress = data['user']['user']['EmailAddress'];
		this.ClientRegisterEntity.FirstName = data['user']['user']['FirstName'];
		this.ClientRegisterEntity.LastName = data['user']['user']['LastName'];
		this.ClientRegisterEntity.PhoneNumber = data['user']['user']['PhoneNumber'];

		this.CompanyEntity.CompanyName = data['user']['company']['CompanyName'];
		this.CompanyEntity.CEmailAddress = data['user']['company']['CompanyEmail'];
		this.CompanyEntity.URL = data['user']['company']['Website'];
		this.CompanyEntity.CompanyId = data['user']['company']['CompanyId'];
		this.CompanyEntity.UserId = data['user']['company']['UserId'];
		this.CompanyEntity.WorkspaceURL = data['user']['company']['WorkspaceURL'];

		this.ClientRegisterEntity.UserId = data['user']['user']['UserId'];
		this.ClientRegisterEntity.RoleId = data['user']['user']['RoleId'];
		setTimeout(function(){
			$('#demo').colorpicker();
			myInput();
	 	 },100); 
	}, 
	(error) => 
	{
		this.globals.isLoading = false;
		this.router.navigate(['/pagenotfound']);
	});

	}
	show_div(ClientRegisterForm){
		this.submitted = true;
		if(ClientRegisterForm.valid){
     
			this.reg_form = false;
			this.CompanyEntity.color1 = '#880AEF';
			this.btn_disable = false;
			this.submitted = false;
			setTimeout(function(){
				$('#demo').colorpicker();
				myInput();
			  },100);
		}
	}
	show_div1(ClientRegisterForm){
			this.reg_form = true;
			this.btn_disable = false;
			setTimeout(function(){
				//$('#demo').colorpicker();
				myInput();
			  },100);
		
	}
  updateClient(companyRegisterForm){ debugger
	let file1 = this.elem.nativeElement.querySelector('#fileToUpload').files[0];
	let file2 = this.elem.nativeElement.querySelector('#Favicon').files[0];		
	var fd = new FormData();
	if (file1) {				
		fd.append('logo', file1);
		this.CompanyEntity.fileToUpload = file1['name'];
		this.CompanyEntity.CompanyLogo = this.CompanyEntity.fileToUpload;		
	} else {
		fd.append('logo', null);
		this.CompanyEntity.fileToUpload = null;
	}		
	if(file2){
		fd.append('favicon', file2);
		this.CompanyEntity.Faviconicon = file2['name'];
		this.CompanyEntity.Favicon = this.CompanyEntity.Faviconicon;
	} else {
		fd.append('favicon', null);
		this.CompanyEntity.Faviconicon = null;
	}
		this.submitted = true;

		if(companyRegisterForm.valid){
      this.btn_disable = true;
			this.globals.isLoading = true;
			this.CompanyEntity.ThemeCode = $('#demo').val();
			var obj = {'RegisterEntity' : this.ClientRegisterEntity, 'CompanyEntity' : this.CompanyEntity};
			this.ClientRegistrationService.updateClient(obj)
			.then((data) => 
			{				
			if(file1 || file2){
				this.EditprofileService.uploadFile(fd)
				.then((data) => 
				{	
					this.globals.isLoading = false;
					this.btn_disable = false;
					this.submitted = false;
					this.ClientRegisterEntity = {};
					this.CompanyEntity = {};
					companyRegisterForm.form.markAsPristine();   
					this.router.navigate(['/dashboard']);	
				}, 
				(error) => 
				{ 
					this.btn_disable = false;
					this.submitted = false;
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
			} else {
					this.globals.isLoading = false;
					this.btn_disable = false;
					this.submitted = false;
					this.ClientRegisterEntity = {};
					this.CompanyEntity = {};
					companyRegisterForm.form.markAsPristine();   
					this.router.navigate(['/dashboard']);
			}
			$("#fileToUpload").val(null);
			$("#Favicon").val(null);
			this.CompanyEntity.fileToUpload = null;
			this.CompanyEntity.Faviconicon = null;
			$('#logo_upload input[type="text"]').val(null);
			$('#favicon_upload input[type="text"]').val(null);
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
  getStateList(ClientRegisterForm)
	{ 
		ClientRegisterForm.form.controls.StateId.markAsDirty();
		this.ClientRegisterEntity.StateId='';
		if(this.ClientRegisterEntity.CountryId > 0){
			this.ClientRegistrationService.getStateList(this.ClientRegisterEntity.CountryId)
			.then((data) => 
			{
				this.stateList = data;
			}, 
			(error) => 
			{
				//alert('error');
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});
		} else {
			this.stateList = [];
		}
	}
	checkpassword(){ 
		if(this.ClientRegisterEntity.cPassword != this.ClientRegisterEntity.Password){
			this.same = true;
		} else {
			this.same = false;
		}
		
	}
	
}
