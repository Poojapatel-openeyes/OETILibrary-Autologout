import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CountryService } from '../services/country.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';

declare var $,unescape,swal: any;
@Component({
  selector: 'app-countrylist',
  templateUrl: './countrylist.component.html',
  styleUrls: ['./countrylist.component.css']
})
export class CountrylistComponent implements OnInit {

    CountryList;
	deleteEntity;
	msgflag;
	message;
	type;
	permissionEntity;

 constructor(public globals: Globals, private router: Router, 
	private CountryService: CountryService,private CommonService: CommonService, private route:ActivatedRoute) { }


  ngOnInit() { 
		this.globals.pageTitle = '- Country';
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
		this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Country'})
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
		this.CountryService.getAll()
		.then((data) => 
		{ 
			setTimeout(function(){
				var table = $('#list_tables').DataTable( {
				//  scrollY: '55vh',
				 responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
				   scrollCollapse: true,           
					 "oLanguage": {
					 "sLengthMenu": "_MENU_ Countries per Page",
					 "sInfo": "Showing _START_ to _END_ of _TOTAL_ Countries",
					 "sInfoFiltered": "(filtered from _MAX_ total Countries)",
					 "sInfoEmpty": "Showing 0 to 0 of 0 Countries"
					 },
					 dom: 'lBfrtip',
					 buttons: [
					   
					   ]
				   });
				   
				   var buttons = new $.fn.dataTable.Buttons(table, {
				   buttons: [
						 {
						 extend: 'excel',
						 title: 'Country List',
						 exportOptions: {
						   columns: [ 0, 1, 2, 3 ]
						   }
						 },
						 {
						 extend: 'print',
						 title: 'Country List',
						 exportOptions: {
						   columns: [ 0, 1, 2, 3 ]
						   }
						 },
					   ]
				   }).container().appendTo($('#buttons'));
				},100); 
			this.CountryList = data;	
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
			$(".country").parent().addClass("in");
			$(".settings").addClass("active"); 
			$(".country").addClass("active");	
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}  		
		},500);
	}

	deleteCountry(Country)
	{ 
		this.deleteEntity =  Country;
		swal({
			title: 'Are you sure?',
			text: "You want to remove this Country?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		})
		.then((result) => {
			if (result.value) {
		var del={'Userid':this.globals.authData.UserId,'id':Country.CountryId};
		this.CountryService.delete(del)
		.then((data) => 
		{
			let index = this.CountryList.indexOf(Country);
			$('#Delete_Modal').modal('hide');
			if (index != -1) {
				this.CountryList.splice(index, 1);
			}	
			swal({
				position: 'top-end',
				type: 'success',
				title: 'Country deleted successfully',
				showConfirmButton: false,
				timer: 1500
			})
		}, 
		(error) => 
		{
			$('#Delete_Modal').modal('hide');
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

	deleteConfirm(Country)
	{ 	
			
	}
	isActiveChange(changeEntity, i)
  { 
    if(this.CountryList[i].IsActive==1){
      this.CountryList[i].IsActive = 0;
      changeEntity.IsActive = 0;
    } else {
      this.CountryList[i].IsActive = 1;
      changeEntity.IsActive = 1;
    }
    this.globals.isLoading = true;
    changeEntity.UpdatedBy = this.globals.authData.UserId;
		this.CountryService.isActiveChange(changeEntity)
		.then((data) => 
		{	      
      this.globals.isLoading = false;	

			swal({
				position: 'top-end',
				type: 'success',
				title: 'Country updated successfully' ,
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
