import { Component, OnInit, ElementRef } from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { ContactusService } from '../services/contactus.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape	: any;

@Component({
  selector: 'app-inquiry-list',
  templateUrl: './inquiry-list.component.html',
  styleUrls: ['./inquiry-list.component.css']
})
export class InquiryListComponent implements OnInit {
  inquiryList;
  permissionEntity;
  constructor(private el: ElementRef, private router: Router, private route: ActivatedRoute,
    private ContactusService: ContactusService, private CommonService: CommonService, public globals: Globals) 
 { }

  ngOnInit() {
    this.globals.pageTitle = '-Inquiry';
    $("footer").addClass("footer_admin");
    if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
      $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
  } else {
  $('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
}
    this.globals.isLoading = true;
    this.permissionEntity = {}; 
    if(this.globals.authData.RoleId==5){
      this.permissionEntity.View=1;
      this.permissionEntity.AddEdit=1;
      this.permissionEntity.Delete=1;
      this.default();
    } else {		
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Contact us Inquiries'})
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
    this.ContactusService.getAllInquiry()
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
                 "sLengthMenu": "_MENU_ Inquiries per Page",
                 "sInfo": "Showing _START_ to _END_ of _TOTAL_ Inquiries",
                 "sInfoFiltered": "(filtered from _MAX_ total Inquiries)",
                 "sInfoEmpty": "Showing 0 to 0 of 0 Inquiries"
               },
               dom: 'lBfrtip',
               buttons: [
                     
                   ]
             });
             
             var buttons = new $.fn.dataTable.Buttons(table, {
             buttons: [
                         {
                         extend: 'excel',
                         title: 'Inquiry List',
                         exportOptions: {
                           columns: [ 0, 1, 2, 3 ]
                           }
                         },
                         {
                         extend: 'print',
                         title: 'Inquiry List',
                         exportOptions: {
                           columns: [ 0, 1, 2, 3 ]
                           }
                         },
                     ]
           }).container().appendTo($('#buttons'));
      },100); 
      this.inquiryList = data;	
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
      $(".inquiry").parent().addClass("in");
      $(".reports").addClass("active"); 
      $(".inquiry").addClass("active");	
      if ($("body").height() < $(window).height()) {  
        $('footer').addClass('footer_fixed');     
    }      
    else{  
        $('footer').removeClass('footer_fixed');    
    }
		},500);
  }

}
