import { Component, OnInit } from '@angular/core';
import { Globals } from '../globals';
declare var $: any;

@Component({
  selector: 'app-error',
  templateUrl: './error.component.html',
  styleUrls: ['./error.component.css']
})
export class ErrorComponent implements OnInit {

  constructor(public globals: Globals) { }

  ngOnInit() {
    this.globals.pageTitle = '- 404 Not Found';
    $("footer").removeClass("footer_admin");
    if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
      $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
  } else {
  $('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
}
    this.globals.isLoading = false;
    if ($("body").height() < $(window).height()) {  
      $('footer').addClass('footer_fixed');     
  }      
  else{  
      $('footer').removeClass('footer_fixed');    
  }
  }

}
