import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { LicencePackService } from '../services/licence-pack.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape,swal: any;

@Component({
  selector: 'app-licence-pack-list',
  templateUrl: './licence-pack-list.component.html',
  styleUrls: ['./licence-pack-list.component.css']
})
export class LicencePackListComponent implements OnInit {

	LicensePackList;
	deleteEntity;
	msgflag;
	message;
	type;
	permissionEntity;

	 constructor(private router: Router, private route: ActivatedRoute, 
		private LicencePackService: LicencePackService, private CommonService: CommonService, public globals: Globals) { }

 ngOnInit()
  {	
		this.globals.pageTitle = '- License Pack';
	$("footer").addClass("footer_admin");
	if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
		$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
} else {
$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
}
	this.globals.isLoading = true;	
	$("body").tooltip({
		selector: "[data-toggle='tooltip']"
	});
	this.permissionEntity = {}; 
		if(this.globals.authData.RoleId==5){
			this.permissionEntity.View=1;
			this.permissionEntity.AddEdit=1;
			this.permissionEntity.Delete=1;
			this.default();
		} else {		
			this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Licence-pack'})
			.then((data) => 
			{
				this.permissionEntity = data;
				if(this.permissionEntity.View==1 ||  this.permissionEntity.AddEdit==1 || this.permissionEntity.Delete==1){
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
		this.LicencePackService.getAll()
		.then((data) => 
		{
			setTimeout(function(){
        var table = $('#list_tables').DataTable( {
          //scrollY: '55vh',
		   responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
           scrollCollapse: true,           
             "oLanguage": {
             "sLengthMenu": "_MENU_ License Packs per Page",
             "sInfo": "Showing _START_ to _END_ of _TOTAL_ License Packs",
             "sInfoFiltered": "(filtered from _MAX_ total License Packs)",
             "sInfoEmpty": "Showing 0 to 0 of 0 License Packs"
             },
             dom: 'lBfrtip',
             buttons: [
               
               ]
           });
           
           var buttons = new $.fn.dataTable.Buttons(table, {
           buttons: [
                 {
                 extend: 'excel',
                 title: 'License Pack List',
                 exportOptions: {
                   columns: [ 0, 1, 2, 3 ]
                   }
                 },
                 {
                 extend: 'print',
                 title: 'License Pack List',
                 exportOptions: {
                   columns: [ 0, 1, 2, 3 ]
                   }
                 },
               ]
           }).container().appendTo($('#buttons'));
        },100); 
			this.LicensePackList = data;
			this.globals.isLoading = false;	
		}, 
		(error) => 
		{
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);	
		});	
	  this.msgflag = false;
	  setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".licensepack").parent().addClass("in");
			$(".managelicense").addClass("active"); 
			$(".licensepack").addClass("active");	
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}
	  },500);
	}

  deleteLicencePack(LicencePack)
	{ 
		this.deleteEntity =  LicencePack;
		swal({
			title: 'Are you sure?',
			text: "You want to buy this License Pack?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, it!'
		})
		.then((result) => {
			if (result.value) {
				var del={'Userid':this.globals.authData.UserId,'id':LicencePack.LicensePackId};
				this.LicencePackService.deleteLicencePack(del)
				.then((data) => 
				{
					let index = this.LicensePackList.indexOf(LicencePack);
		
					if (index != -1) {
						this.LicensePackList.splice(index, 1);
					}	
				
					swal({
						position: 'top-end',
						type: 'success',
						title: 'Licence Pack deleted successfully',
						showConfirmButton: false,
						timer: 1500
					})
				}, 
				(error) => 
				{
			
					if(error.text){
						swal({
							position: 'top-end',
							type: 'success',
							title: "You can't delete this record because of their dependency!",
							showConfirmButton: false,
							timer: 1500
						})
					}	
				});			

			}
		})				
	}
  

	isActiveChange(changeEntity, i)
  { 
    if(this.LicensePackList[i].IsActive==1){
      this.LicensePackList[i].IsActive = 0;
      changeEntity.IsActive = 0;
    } else {
      this.LicensePackList[i].IsActive = 1;
      changeEntity.IsActive = 1;
    }
    this.globals.isLoading = true;
    changeEntity.UpdatedBy = this.globals.authData.UserId;
		this.LicencePackService.isActiveChange(changeEntity)
		.then((data) => 
		{	      
      this.globals.isLoading = false;	
		
			swal({
				position: 'top-end',
				type: 'success',
				title: 'License Pack updated successfully' ,
				showConfirmButton: false,
				timer: 5000
			  })			
		}, 
		(error) => 
		{
      this.globals.isLoading = false;
      this.router.navigate(['/pagenotfound']);
		});		
	}

}


