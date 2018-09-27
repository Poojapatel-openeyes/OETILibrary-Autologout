import { Component, OnInit, ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { AuditlogService } from '../services/auditlog.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape: any;

@Component({
  selector: 'app-activity-log',
  templateUrl: './activity-log.component.html',
  styleUrls: ['./activity-log.component.css']
})
export class ActivityLogComponent implements OnInit {

	activitylogList;
	permissionEntity;
	
	constructor(private el: ElementRef, private http: Http, private router: Router, private route: ActivatedRoute,
		 private AuditlogService: AuditlogService, public globals: Globals, private CommonService: CommonService) 
  {
	
  }

  ngOnInit() { 
		this.globals.pageTitle = '- Activity Log';
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
		this.AuditlogService.getActivityLog()
      .then((data) => 
      { 
        this.activitylogList = data;	
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
						title: 'Activity Log List',
						exportOptions: {
							columns: [ 0, 1, 2, 3, 4, 5 ]
								}
							},
								{
								extend: 'print',
								title: 'Activity Log List',
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
          $(".activitylog").parent().addClass("in");
					$(".log").addClass("active"); 
          $(".activitylog").addClass("active");
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

  printData()
	{
		var divToPrint=document.getElementById("dataTables-example");
		var newWin= window.open("");
		newWin.document.write(divToPrint.outerHTML);
		newWin.print();
		newWin.close();
	}

	tableToExcel(table, name)
	{
		var uri = 'data:application/vnd.ms-excel;base64,'
		, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
		, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
		, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
		if (!table.nodeType){ table = document.getElementById(table)
		var ctx = {worksheet: name || 'Worksheet', table: table.outerHTML}
		window.location.href = uri + base64(format(template, ctx))}
	}

}


