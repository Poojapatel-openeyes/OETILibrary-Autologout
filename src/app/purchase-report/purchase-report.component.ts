import { Component, OnInit, ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { PurchaseReportService } from '../services/purchase-report.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,unescape: any;

@Component({
  selector: 'app-purchase-report',
  templateUrl: './purchase-report.component.html',
  styleUrls: ['./purchase-report.component.css']
})
export class PurchaseReportComponent implements OnInit {

	PurchaseList;
	permissionEntity;
	
	constructor(private el: ElementRef, private http: Http, private router: Router, private route: ActivatedRoute,
		 private PurchaseReportService: PurchaseReportService, public globals: Globals, private CommonService: CommonService) 
  {
	
  }

  ngOnInit() { 
    this.globals.pageTitle = '- License Pack Purchase Report';
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
      this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'purchase-report'})
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
		this.PurchaseReportService.getAll()
      .then((data) => 
      { 
        this.PurchaseList = data;	
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
          "sLengthMenu": "_MENU_ Client Purchase per Page",
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ Client Purchase",
                "sInfoFiltered": "(filtered from _MAX_ total Client Purchase)",
                "sInfoEmpty": "Showing 0 to 0 of 0 Client Purchase"
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
						title: 'Client Purchase List',
						exportOptions: {
							columns: [ 0, 1, 2, 3, 4, 5 ]
								}
							},
								{
								extend: 'print',
								title: 'Client Purchase List',
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
          $(".purchasereport").parent().addClass("in");
					$(".reports").addClass("active"); 
          $(".purchasereport").addClass("active");
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


