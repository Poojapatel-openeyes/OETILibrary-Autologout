import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ContactusService } from '../services/contactus.service';
import { Globals } from '.././globals';
declare var $,unescape,swal: any;
declare function myInput(): any;

import { ViewEncapsulation, ViewChild, ElementRef, PipeTransform, Pipe } from '@angular/core';
import { DomSanitizer } from "@angular/platform-browser";

@Pipe({ name: 'safe' })
export class SafePipe implements PipeTransform {
  constructor(private sanitizer: DomSanitizer) { }
  transform(url) {
    return this.sanitizer.bypassSecurityTrustResourceUrl(url);
  }
}

@Component({
  selector: 'app-contactus',
  templateUrl: './contactus.component.html',
  styleUrls: ['./contactus.component.css']
})
export class ContactusComponent implements OnInit {

  InquiryEntity;
  InquiryEntity_backup;
  contactDetails;
  submitted;
  btn_disable;
  header;

  constructor(private router: Router, private ContactusService: ContactusService, public globals: Globals) 
 {
 
 }

  ngOnInit() {
    this.globals.pageTitle = '- Contact us';
   this.submitted = false;
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
    this.contactDetails = {};
    this.InquiryEntity = {};
    this.globals.isLoading = true;	
    this.ContactusService.getContactDetails(this.globals.authData.UserId)
    .then((data) => 
    { 
      this.contactDetails.address = data['address'];	
      this.contactDetails.phone = data['phone'];	
      this.contactDetails.email = data['email'];
      this.contactDetails.latitude = data['latitude'];
      this.contactDetails.longitude = data['longitude'];
      //this.contactDetails.iframeURL = 'https://www.google.com/maps/embed/v1/place?q=40.871345,-74.314276&amp;key=AIzaSyCqXy1NiPqEGtRkUWDmeJ1dZixYnLlXhW8';

      this.InquiryEntity = data['user'];
      this.InquiryEntity_backup = this.InquiryEntity;
      //console.log(this.InquiryEntity);
      this.globals.isLoading = false;	
      setTimeout(function(){
        if ($("body").height() < $(window).height()) {  
          $('footer').addClass('footer_fixed');  
			}      
			else{  
					$('footer').removeClass('footer_fixed');    
      }
      myInput(); 
      },100);
    }, 
    (error) => 
    {
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
    });
  }

  addInquiry(InquiryForm) {
    this.InquiryEntity.CreatedBy = this.globals.authData.UserId;
    this.InquiryEntity.UserId = this.globals.authData.UserId;
    this.InquiryEntity.RoleId = this.globals.authData.RoleId;
    this.submitted = true; debugger
    //alert(this.submitted);
		if (InquiryForm.valid) {
      this.globals.isLoading = true;
			this.btn_disable = true;
			this.ContactusService.add(this.InquiryEntity)
				.then((data) => { debugger
          this.globals.isLoading = false;
					this.btn_disable = false;
          this.submitted = false;         
          this.InquiryEntity_backup.Message = null;
          this.InquiryEntity = this.InquiryEntity_backup;
					InquiryForm.form.markAsPristine();
          swal({
            position: 'top-end',
            type: 'success',
            title: 'Inquiry submitted successfully',
            showConfirmButton: false,
            timer: 1500
          })
				},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.router.navigate(['/pagenotfound']);
				});
		}
	}

}
