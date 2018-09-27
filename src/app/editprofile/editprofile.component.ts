import { Component, OnInit,ElementRef } from '@angular/core';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { EditprofileService } from '../services/editprofile.service';
import { Http,RequestOptions, Headers } from '@angular/http';
import { HttpClient } from "@angular/common/http";
declare function myInput(): any;
declare var $,swal: any;

@Component({
  selector: 'app-editprofile',
  templateUrl: './editprofile.component.html',
  styleUrls: ['./editprofile.component.css']
})
export class EditprofileComponent implements OnInit {
	RegisterEntity;
	CountryList;
	stateList;
	submitted;
	btn_disable;

	CompanyEntity;
	submitted1;
	btn_disable1;

	newpassEntity;
	submitted2;
	btn_disable2;
	header;
	same;

	firstNameChar;
  lastNameChar;
  
	constructor(public globals: Globals, private router: Router, private EditprofileService: EditprofileService,
		private route:ActivatedRoute,private elem: ElementRef,private http: HttpClient) { }

  ngOnInit() {
	this.globals.pageTitle = '- My Profile';
	if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
        $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
    } else {
		$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
	}
		if(this.globals.authData.RoleId!=4){
			$("footer").addClass("footer_admin");
		} else {
			$("footer").removeClass("footer_admin");
		}		
		this.globals.msgflag = false;
		this.default();
		this.firstNameChar = this.globals.authData.FirstName.slice(0,1);
    	this.lastNameChar = this.globals.authData.LastName.slice(0,1);
	}
	
	default(){
		this.globals.isLoading = true;
    this.btn_disable = false;
		this.RegisterEntity={}; 
    this.RegisterEntity.CountryId ='';
		this.RegisterEntity.StateId ='';
		this.newpassEntity={};
		this.CompanyEntity={};
  
    this.EditprofileService.getProfileById(this.globals.authData.UserId)
      .then((data) => {
				this.RegisterEntity = data['user'];
				this.CountryList = data['country'];
				this.stateList = data['state'];
				this.CompanyEntity = data['company'];
				this.globals.isLoading = false;
				$('#demo').val(this.CompanyEntity.ThemeCode);
				$('#demo').addClass('filled');
				$('#demo').parents('.form-group').addClass('focused');
				$("#fileToUpload").val(null);
				$("#Favicon").val(null);
				this.CompanyEntity.fileToUpload = null;
				this.CompanyEntity.Faviconicon = null;
				$('#logo_upload input[type="text"]').val(null);
				$('#favicon_upload input[type="text"]').val(null);	
				setTimeout(function(){
					$('#demo').colorpicker();
					myInput();
			  },500); 
      },
      (error) => {
        this.btn_disable = false;
        this.submitted = false;
        this.globals.isLoading = false;
        this.router.navigate(['/pagenotfound']);
      });
	}

	tabchange(){
    this.globals.msgflag = false;
	}

	updateCompany(companyRegisterForm){ 
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
		this.submitted1 = true;

		if(companyRegisterForm.valid){
      this.CompanyEntity.ThemeCode = $('#demo').val();
      this.btn_disable1 = true;
			this.globals.isLoading = true;			
			this.CompanyEntity.UpdatedBy = this.globals.authData.UserId;
			this.EditprofileService.updateCompany(this.CompanyEntity)
			.then((data) => 
			{	
				if(file1 || file2){
					this.EditprofileService.uploadFile(fd)
					.then((data) => 
					{	
						this.globals.isLoading = false;
						this.btn_disable1 = false;
						this.submitted1 = false;
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Company Details updated successfully',
							showConfirmButton: false,
							timer: 1500
						})
						companyRegisterForm.form.markAsPristine();	
						
					}, 
					(error) => 
					{ 
						this.btn_disable1 = false;
						this.submitted1 = false;
						this.globals.isLoading = false;
						this.router.navigate(['/pagenotfound']);
					});
				} else {
					this.globals.isLoading = false;
					this.btn_disable1 = false;
					this.submitted1 = false;
				
					swal({
						position: 'top-end',
						type: 'success',
						title: 'Company Details updated successfully',
						showConfirmButton: false,
						timer: 1500
					})
					companyRegisterForm.form.markAsPristine();
				}
				$("#fileToUpload").val(null);
				$("#Favicon").val(null);
				this.CompanyEntity.fileToUpload = null;
				this.CompanyEntity.Faviconicon = null;
				$('#logo_upload input[type="text"]').val(null);
				$('#favicon_upload input[type="text"]').val(null);	
				location.reload(true);	
			}, 
			(error) => 
			{ 
				this.btn_disable1 = false;
				this.submitted1 = false;
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});
		} 	
  }

	editprofile(RegisterForm){
	
    this.submitted = false;
		this.btn_disable = true;
		this.globals.isLoading = true;
      
			this.EditprofileService.editprofile(this.RegisterEntity)			
			.then((data) => 
			{ 
				this.globals.isLoading = false;
				this.btn_disable = false;
				this.submitted = false;

        swal({
			position: 'top-end',
			type: 'success',
			title: 'Profile updated successfully',
			showConfirmButton: false,
			timer: 1500
		})
				
			}, 
			(error) => 
			{
				this.btn_disable = false;
				this.submitted = false;
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});
		
	}
	
	getStateList(RegisterForm)
	{ 
		RegisterForm.form.controls.StateId.markAsDirty();
		this.RegisterEntity.StateId='';
		if(this.RegisterEntity.CountryId > 0){
			this.EditprofileService.getStateList(this.RegisterEntity.CountryId)
			.then((data) => 
			{
				this.stateList = data;
			}, 
			(error) => 
			{
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});
		} else {
			this.stateList = [];
		}
	}

	ChangePassword(newpassForm)
  {	
		this.submitted2 = true;
		if(newpassForm.valid && !this.same)
		{			
			this.newpassEntity.UserId=this.globals.authData.UserId;
			this.btn_disable2 = true;
			this.globals.isLoading = true;
			this.EditprofileService.changepassword(this.newpassEntity)
			.then((data) => 
			{
				if(data=='wrong current password')
				{
      
		  swal({
			type: 'warning',
			title: 'Oops...',
			text: 'You entered wrong Current Password',
			
		  })
          this.globals.isLoading = false;
          this.btn_disable2 = false;
          this.submitted2 = false;
				}
				else
        {
          this.btn_disable2 = false;
          this.submitted2 = false;
          this.newpassEntity = {};
          newpassForm.form.markAsPristine();
          this.globals.isLoading = false;
		  swal({
			position: 'top-end',
			type: 'success',
			title: 'Your Password has been changed successfully',
			showConfirmButton: false,
			timer: 1500
		})
          //this.router.navigate(['/changepassword']);
        }
			}, 
			(error) => 
			{
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
				this.btn_disable2 = false;
				this.submitted2 = false;
			});	
		
		}
	}
  
  checkpassword(){ 
		if(this.newpassEntity.cPassword != this.newpassEntity.nPassword){
			this.same = true;
		} else {
			this.same = false;
		}		
	}

	clearChangePassword(newpassForm){
		this.btn_disable2 = false;
		this.submitted2 = false;
		this.newpassEntity = {};
		newpassForm.form.markAsPristine();
	}

	clearEditProfile(){ 
		this.default();
	}

}
