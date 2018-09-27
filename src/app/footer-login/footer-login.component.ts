import { Component, OnInit } from '@angular/core';
declare var $,unescape : any;
@Component({
  selector: 'app-footer-login',
  templateUrl: './footer-login.component.html',
  styleUrls: ['./footer-login.component.css']
})
export class FooterLoginComponent implements OnInit {

  constructor() { }

  ngOnInit() {
	  
	   $('body').tooltip({
        selector: '[data-toggle="tooltip"], [title]:not([data-toggle="popover"])',
        trigger: 'hover',
        container: 'body'
    }).on('click mousedown mouseup', '[data-toggle="tooltip"], [title]:not([data-toggle="popover"])', function () {
        $('[data-toggle="tooltip"], [title]:not([data-toggle="popover"])').tooltip('destroy');
    });	
	
  }

}
