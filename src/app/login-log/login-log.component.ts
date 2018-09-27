import { Component, OnInit, ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { AuditlogService } from '../services/auditlog.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape: any;

@Component({
  selector: 'app-login-log',
  templateUrl: './login-log.component.html',
  styleUrls: ['./login-log.component.css']
})
export class LoginLogComponent implements OnInit {

  loginlogList;
  permissionEntity;
	
	constructor(private el: ElementRef, private http: Http, private router: Router, private route: ActivatedRoute,
		 private AuditlogService: AuditlogService, public globals: Globals, private CommonService: CommonService) 
  {
	
  }

  ngOnInit() { 
    this.globals.pageTitle = '- Login Log';    
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
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Placeholder Screen'})
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
  
    this.AuditlogService.getLoginLog()
      .then((data) => 
      { 
        this.loginlogList = data;	
        setTimeout(function(){
        var table = $('#list_tables').DataTable( {
         // scrollY: '55vh',
		  responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
				  scrollCollapse: true,  
          "oLanguage": {
          "sLengthMenu": "_MENU_ Logs per Page",
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ Logs",
                "sInfoFiltered": "(filtered from _MAX_ total Logs)",
                "sInfoEmpty": "Showing 0 to 0 of 0 Logs"
          },
		  dom: 'lBfrtip',
						buttons: [
									//'pageLength','print','excel'
								 ]
        });
		var buttons = new $.fn.dataTable.Buttons(table, {
				buttons: [
						{
						extend: 'excel',
						title: 'Login Log List',
						exportOptions: {
							columns: [ 0, 1, 2, 3, 4, 5 ]
								}
							},
								{
								extend: 'print',
								title: 'Login Log List',
								exportOptions: {
								columns: [ 0, 1, 2, 3, 4, 5 ]
								}
							},
						]
					}).container().appendTo($('#buttons'));
        },100); 	
        this.globals.isLoading = false;
        setTimeout(function(){
          $(".test").removeClass("active");
          $(".test").parent().removeClass("in");
          $(".loginlog").parent().addClass("in");
          $(".log").addClass("active"); 
          $(".loginlog").addClass("active");	
          if ($("body").height() < $(window).height()) {  
            $('footer').addClass('footer_fixed');     
          }      
          else{  
            $('footer').removeClass('footer_fixed');    
          }
        },500);
      }, 
      (error) => 
      {
        this.globals.isLoading = false;
        this.router.navigate(['/pagenotfound']);
      });    
  }

}



