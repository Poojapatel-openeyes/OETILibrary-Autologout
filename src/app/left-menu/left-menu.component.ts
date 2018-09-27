import { Component, OnInit } from '@angular/core';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { RolepermissionService } from '../services/rolepermission.service';
declare var $,PerfectScrollbar: any;
@Component({
  selector: 'app-left-menu',
  templateUrl: './left-menu.component.html',
  styleUrls: ['./left-menu.component.css']
})
export class LeftMenuComponent implements OnInit {

  menuList;
  
  constructor(public globals: Globals, private router: Router, private RolepermissionService: RolepermissionService) { }

  ngOnInit() {

    this.globals.isLoading = true;
    this.menuList = [];   
    this.RolepermissionService.getLeftMenu(this.globals.authData.RoleId)
			.then((data) => 
			{
        this.menuList = data; 
        this.globals.isLoading = false;
			},
			(error) => 
			{
        this.globals.isLoading = false;
        this.router.navigate(['/admin/pagenotfound']);
      });	
	  
      new PerfectScrollbar('.ul_block'); 
$('body').tooltip({
        selector: '[data-toggle="tooltip"], [title]:not([data-toggle="popover"])',
        trigger: 'hover',
        container: 'body'
    }).on('click mousedown mouseup', '[data-toggle="tooltip"], [title]:not([data-toggle="popover"])', function () {
        $('[data-toggle="tooltip"], [title]:not([data-toggle="popover"])').tooltip('destroy');
    });	  

	
			
	 $('.hamburger').click(function(){
    $(this).toggleClass("active");
	$('.ul_block').toggleClass("active");
});
	


$('.mainscreenhamburger').click(function(){
    $(this).toggleClass("active_togglemainscreen");
	$('#container').toggleClass("active_ulmainscreen");
	$('.col-md-10.col-sm-12.col-md-offset-2').toggleClass("active_divmainscreen");
	$('footer.footer_admin').toggleClass("active_footermainscreen");
});


  }



  dash(){
    $(".test").removeClass("active");
    $(".dropdown-toggle ").addClass("collapsed");
    $(".dropdown-toggle ").attr("aria-expanded","false");
    $(".test").parent().removeClass("in");
    $("#dash").addClass("active");
  }
toogle(id){
//	alert(id);
	if ($("#toggle"+id).hasClass("collapsed")) {
       // alert("yes");
	 $(".test").removeClass("active");
    $(".dropdown-toggle").addClass("collapsed");
    $(".dropdown-toggle").attr("aria-expanded","false");
    $(".test").parent().removeClass("in");
    }
	else{
	//	alert("no");
	}
	
}
  menuopen(path){
   // $(".test").removeClass("active");
   // $(".dropdown-toggle").addClass("collapsed");
   // $(".dropdown-toggle").attr("aria-expanded","false");
   // $(".test").parent().removeClass("in");
    this.globals.msgflag = false;	  
    this.globals.currentLink = this.router.url;
    this.router.navigate([path]);
	
  }

}


