import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { PurchaseLicensepackService } from '../services/purchase-licensepack.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape,swal: any;

@Component({
  selector: 'app-purchase-licensepack',
  templateUrl: './purchase-licensepack.component.html',
  styleUrls: ['./purchase-licensepack.component.css']
})
export class PurchaseLicensepackComponent implements OnInit {

	LicensePackList;
	PurchaseEntity;

  constructor(private router: Router, private route: ActivatedRoute, 
		private PurchaseLicensepackService: PurchaseLicensepackService, private CommonService: CommonService, public globals: Globals) { }

  ngOnInit() {
	this.globals.pageTitle = '- Purchase License';
    $("footer").addClass("footer_admin");
		this.default();
		
		if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
			$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
		} else {
		$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
		}		
  }
  default(){
		this.globals.isLoading = true;	
		this.PurchaseLicensepackService.getAll()
		.then((data) => 
		{
      this.LicensePackList = data;
			this.globals.isLoading = false;	
    }, 
		(error) => 
		{
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);	
		});	
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".purchaselicensepack").parent().addClass("in");
			$(".managelicense").addClass("active"); 
			$(".purchaselicensepack").addClass("active");	
      if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
			}      
			else{  
				$('footer').removeClass('footer_fixed');    
			}
		},500);
	}
	PurchasePack(LicensePack){
		this.PurchaseEntity =  LicensePack;
		swal({
			title: 'Are you sure?',
			text: "You want to buy this License Pack?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		})
		.then((result) => {
			if (result.value) {
		this.PurchaseEntity.CreatedBy = this.globals.authData.UserId;
		this.PurchaseEntity.UpdatedBy = this.globals.authData.UserId;
		this.PurchaseEntity.UserId = this.globals.authData.UserId;
			this.globals.isLoading = true;
			if(this.PurchaseEntity.discountTypeName=='License'){
				this.PurchaseEntity.TotalLicense = parseInt(this.PurchaseEntity.NoOfLicense) + parseInt(this.PurchaseEntity.discountValue);
			} else {
				this.PurchaseEntity.TotalLicense =  this.PurchaseEntity.NoOfLicense;
			}
			this.PurchaseLicensepackService.addPurchase(this.PurchaseEntity)
				.then((data) => {					
					this.globals.isLoading = false;
				
						this.PurchaseEntity = {};
				
						swal({
							position: 'top-end',
							type: 'success',
							title: 'License Pack purchased successfully',
							showConfirmButton: false,
							timer: 1500
						})
						//this.router.navigate(['/purchase-licensepack']);
					
				},
				(error) => {
					this.globals.isLoading = false;
				
					this.router.navigate(['/pagenotfound']);
				});
			}
		})
	
	}
	PurchaseConfirm(PurchaseEntity){
		
		
	}
}
