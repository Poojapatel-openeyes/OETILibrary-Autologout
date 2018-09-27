import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { ProvideLicenseService } from '../services/provide-license.service';
import { Globals } from '../globals';
import { CommonService } from '../services/common.service';
declare var $,swal: any;
declare function myInput(): any;

@Component({
  selector: 'app-provide-license',
  templateUrl: './provide-license.component.html',
  styleUrls: ['./provide-license.component.css']
})
export class ProvideLicenseComponent implements OnInit {
  ClientList;
  LicenseList;
	provideLicenseEntity;
	header;
	btn_disable;
  submitted;
  
  constructor(private router: Router, private route: ActivatedRoute,
		private ProvideLicenseService: ProvideLicenseService, public globals: Globals, private CommonService: CommonService) { }

    ngOnInit() {
      this.globals.pageTitle = '- Provide License Pack';
      myInput();
      $("footer").addClass("footer_admin");
      this.provideLicenseEntity = {};
      this.globals.isLoading = true;	
      if(this.globals.authData.RoleId==5){		
        this.default();
      } else {
        this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'provide-license'})
        .then((data) => 
        {
          if(data['AddEdit']==1){
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
      
      this.ProvideLicenseService.getAll()
		.then((data) => {
      this.ClientList = data['clients'];
      this.LicenseList = data['licenses'];
      this.globals.isLoading = false;
		setTimeout(function(){
			$(".test").removeClass("active");
          $(".test").parent().removeClass("in");
          $(".providelicense").parent().addClass("in");
					$(".managelicense").addClass("active"); 
          $(".providelicense").addClass("active");
          if ($("body").height() < $(window).height()) {  
            $('footer').addClass('footer_fixed');     
          }      
          else{  
            $('footer').removeClass('footer_fixed');    
          }
			  },500);		
		},
		(error) => {
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);
		});


    }
    provideLicense(ProvideLicenseForm) {	
      this.provideLicenseEntity.CreatedBy = this.globals.authData.UserId;
		this.provideLicenseEntity.UpdatedBy = this.globals.authData.UserId;
		this.provideLicenseEntity.Id = this.globals.authData.UserId;
			
      this.submitted = true;
      if (ProvideLicenseForm.valid) {
        this.globals.isLoading = true;
        this.btn_disable = true;
        this.ProvideLicenseService.addPurchase(this.provideLicenseEntity)
        .then((data) => {					
          this.globals.isLoading = false;
          this.submitted = false;
          this.btn_disable = false;
            this.provideLicenseEntity = {};
            ProvideLicenseForm.form.markAsPristine();
						swal({
							position: 'top-end',
							type: 'success',
							title: 'License Pack provided successfully',
							showConfirmButton: false,
							timer: 1500
						})
						this.router.navigate(['/provide-license']);
				},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
      }
    }

}
