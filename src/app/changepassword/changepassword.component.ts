import { Component, OnInit } from '@angular/core';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { ChangepasswordService } from '../services/changepassword.service';
declare var $,swal: any;

@Component({
  selector: 'app-changepassword',
  templateUrl: './changepassword.component.html',
  styleUrls: ['./changepassword.component.css']
})
export class ChangepasswordComponent implements OnInit {
	newpassEntity;
	submitted;
	btn_disable;
	header;
	same;

  constructor(public globals: Globals, private router: Router,private route:ActivatedRoute,private ChangepasswordService:ChangepasswordService) { }

  ngOnInit() {
	this.globals.pageTitle = '- Change Password';
		if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
			$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
	} else {
	$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
} 
	this.globals.isLoading = false;
	this.newpassEntity={};
  this.globals.msgflag = false;
 }
  
  ChangePassword(newpassForm)
  {	
		this.submitted = true;
		if(newpassForm.valid && !this.same)
		{			
			this.newpassEntity.UserId=this.globals.authData.UserId;
			this.btn_disable = true;
			this.globals.isLoading = true;
			this.ChangepasswordService.changepassword(this.newpassEntity)
			.then((data) => 
			{
				if(data=='wrong current password')
				{
          
					swal({
						type: 'warning',
						title: 'Oops...',
						text: 'You entered wrong current password',
						
						})
					
          this.globals.isLoading = false;
          this.btn_disable = false;
          this.submitted = false;
				}
				else
        {
          this.btn_disable = false;
          this.submitted = false;
          this.newpassEntity = {};
          newpassForm.form.markAsPristine();
          this.globals.isLoading = false;
					swal({
						position: 'top-end',
						type: 'success',
						title: 'Your password has been changed',
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
				this.btn_disable = false;
				this.submitted = false;
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

}
