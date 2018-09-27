import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { UserResultService } from '../services/user-result.service';
import { Globals } from '.././globals';
declare var $: any;

@Component({
  selector: 'app-user-result',
  templateUrl: './user-result.component.html',
  styleUrls: ['./user-result.component.css']
})
export class UserResultComponent implements OnInit {

  constructor(public globals: Globals, private router: Router, private UserResultService: UserResultService) { }
  
  maincatlist;

  ngOnInit() {
    this.globals.pageTitle = '- Feedback Score';
    $("footer").removeClass("footer_admin");
    if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
      $('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
    } else {
    $('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
    }
    this.globals.isLoading = false;
    this.maincatlist = {};

    this.UserResultService.getResult(this.globals.authData.UserId)
		.then((data) => 
		{ 
      if(data=='no'){
        this.globals.isLoading = false;
        this.router.navigate(['/user/feedback']);
      } else if(data=='feedback'){
        this.globals.isLoading = false;
        this.router.navigate(['/user/feedback']);
      }	else {
        this.maincatlist = data;	
        var cat_object = this.maincatlist;
        this.globals.isLoading = false;
        setTimeout(function(){
          for(let obj of cat_object){
            let i = cat_object.indexOf(obj);
            $('#circle'+i).circleProgress({
              value: (obj['score']/4),
              size: 200.0,
              emptyFill: '#ccc',
              fill: {gradient: ['#000', '#222']}
              }).on('circle-animation-progress', function(event, progress) {
                $(this).find('strong').html('<span>'+obj['score']+'</span> Overall Average<br>Score');
            });
            for(let subobj of cat_object[i]['child']){
              let j = cat_object[i]['child'].indexOf(subobj);
              $('#subcircle'+i+''+j).circleProgress({
                value: (subobj['score']/4),
                size: 140.0,
                emptyFill: '#ccc',
                fill: {gradient: ['#000', '#333']}
                }).on('circle-animation-progress', function(event, progress) {
                  $(this).find('strong').html('<span>'+subobj['score']+'</span>');
              });
            }
          }  
          if ($("body").height() < $(window).height()) {  
            $('footer').addClass('footer_fixed');  
            this.globals.isLoading = false;   
          }      
          else{  
              $('footer').removeClass('footer_fixed');    
          }        
        },100); 
      }
		}, 
		(error) => 
		{
			this.globals.isLoading = false;
			this.router.navigate(['/pagenotfound']);
		});	

    // CIRCLE FOR SCORE
// $('#delivering_circle').circleProgress({
//   value: 0.9,
// size: 200.0,
// emptyFill: '#ccc',
// fill: {gradient: ['#B01116', '#222']}
// }).on('circle-animation-progress', function(event, progress) {
//   $(this).find('strong').html('<span>3.6</span> Overall Average<br>Score');
// });
// $('#Opportunistic_circle').circleProgress({
//   value: 0.725,
// size: 140.0,
// emptyFill: '#ccc',
// fill: {gradient: ['#000', '#333']}
// }).on('circle-animation-progress', function(event, progress) {
//   $(this).find('strong').html('<span>2.9</span>');
// });
// $('#Empathetic_circle').circleProgress({
//   value: 0.95,
// size: 140.0,
// emptyFill: '#ccc',
// fill: {gradient: ['#B01116', '#B01116']}
// }).on('circle-animation-progress', function(event, progress) {
//   $(this).find('strong').html('<span>3.8</span>');
// });
//  $('#Progressive_circle').circleProgress({
//   value: 0.925,
// size: 140.0,
// emptyFill: '#ccc',
// fill: {gradient: ['#000', '#000']}
// }).on('circle-animation-progress', function(event, progress) {
//   $(this).find('strong').html('<span>3.7</span>');
// });
// $('#Communication_circle').circleProgress({
//   value: 1.0,
// size: 140.0,
// emptyFill: '#ccc',
// fill: {gradient: ['#B01116', '#B01116']}
// }).on('circle-animation-progress', function(event, progress) {
//    $(this).find('strong').html('<span>4.0</span>');
// });

// $('#receiving_circle').circleProgress({
//   value: 0.525,
// size: 200.0,
// emptyFill: '#ccc',
// fill: {gradient: ['#B01116', '#222']}
// }).on('circle-animation-progress', function(event, progress) {
//   $(this).find('strong').html('<span>2.1</span>Overall Average <br>Score');
// });
// $('#Regulation_circle').circleProgress({
//   value: 0.975,
// size: 140.0,
// emptyFill: '#ccc',
// fill: {gradient: ['#000', '#000']}
// }).on('circle-animation-progress', function(event, progress) {
//   $(this).find('strong').html('<span>3.9</span>');
// });
// $('#Reactive_circle').circleProgress({
//   value: 0.175,
// size: 140.0,
// emptyFill: '#ccc',
// fill: {gradient: ['#B01116', '#B01116']}
// }).on('circle-animation-progress', function(event, progress) {
//   $(this).find('strong').html('<span>0.7</span>');
// });
//  $('#Contingent_circle').circleProgress({
//   value: 0.325,
// size: 140.0,
// emptyFill: '#ccc',
// fill: {gradient: ['#000', '#000']}
// }).on('circle-animation-progress', function(event, progress) {
//   $(this).find('strong').html('<span>1.3</span>');
// });
// $('#Solicitation_circle').circleProgress({
//   value: 0.725,
// size: 140.0,
// emptyFill: '#ccc',
// fill: {gradient: ['#B01116', '#B01116']}
// }).on('circle-animation-progress', function(event, progress) {
//    $(this).find('strong').html('<span>2.9</span>');
// });
// $('#Evidential_circle').circleProgress({
//   value: 0.375,
// size: 140.0,
// emptyFill: '#ccc',
// fill: {gradient: ['#000', '#000']}
// }).on('circle-animation-progress', function(event, progress) {
//    $(this).find('strong').html('<span>1.5</span>');
// });
// END CIRCLE FOR SCORE
  }

}
