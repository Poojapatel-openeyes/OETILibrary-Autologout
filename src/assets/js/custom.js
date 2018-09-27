// ASSESSMENT SLIDER 
 $(window).load(function(){
      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
		smoothHeight : true,
        sync: "#carousel"
      });
    });
// END ASSESSMENT SLIDER

// TOOLTIP 
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
// END TOOLTIP 

// INPUT
$('input').focus(function(){
  $(this).parents('.form-group').addClass('focused');
});
$('select').focus(function(){
  $(this).parents('.form-group').addClass('focused');
});
$('textarea').focus(function(){
  $(this).parents('.form-group').addClass('focused');
});

$('input').blur(function(){
  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
  } else {
    $(this).addClass('filled');
  }
});
$('textarea').blur(function(){
  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
  } else {
    $(this).addClass('filled');
  }
});
$('select').blur(function(){
  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
  } else {
    $(this).addClass('filled');
  }
});

$(document).ready(function() {
$('input').each(function() { 
        if($(this).val()){
			 $(this).addClass('filled');
			$(this).parents('.form-group').addClass('focused');
        }
    });
	$('textarea').each(function() {
        if($(this).val()){
			 $(this).addClass('filled');
			$(this).parents('.form-group').addClass('focused');
        }
    });
	$('select').each(function() {
        if($(this).val()){
			 $(this).addClass('filled');
			$(this).parents('.form-group').addClass('focused');
        }
    });
});
//  $(document).ready(function(){
//    $('.file_upload input[type="file"]').change(function(e){
//        var fileName = e.target.files[0].name;
// 	   $('.file_upload input[type="text"]').val(fileName);
//    });
// });
// END INPUT

// FOOTER FIXED
 $(document).ready(function(){
	if ($("body").height() < $(window).height()) {  
        $('footer').addClass('footer_fixed');     
    }      
    else{  
        $('footer').removeClass('footer_fixed');    
    }
});
// END FOOTER FIXED


// TOUR GUIDE
$(document).ready(function() {
	if ($(".black_tour_section").hasClass("active")) {
		$('body').addClass('overflow_body');
	}
	$("#start_feedback").click(function(){
		$('body').removeClass('overflow_body');
		$('.black_tour_section').removeClass('active');
	});
} );

$(window).on('load',function(){
  $('#DescriptionModal').modal('show');
});
// END TOUR GUIDE

// DATE PICKER
$('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        minDate: 0,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
        forceParse: 0
        
    });
// END DATE PICKER

// // LIST TABLES
// $(document).ready(function() {
// 	var table = $('#list_tables').DataTable( {
// 		 scrollY: '55vh',
//         scrollCollapse: true,           
// 					"oLanguage": {
// 						"sLengthMenu": "_MENU_ Clients per Page",
// 						"sInfo": "Showing _START_ to _END_ of _TOTAL_ Clients",
// 						"sInfoFiltered": "(filtered from _MAX_ total KSAs)",
// 						"sInfoEmpty": "Showing 0 to 0 of 0 Clients"
// 					},
// 					dom: 'lBfrtip',
// 					buttons: [
								
// 							]
// 				});
				
// 				var buttons = new $.fn.dataTable.Buttons(table, {
// 				buttons: [
// 										{
// 										extend: 'excel',
// 										title: 'ClientList',
// 										exportOptions: {
// 											columns: [ 0, 1, 2, 3 ]
// 											}
// 										},
// 										{
// 										extend: 'print',
// 										title: 'Client List',
// 										exportOptions: {
// 											columns: [ 0, 1, 2, 3 ]
// 											}
// 										},
// 								]
// 			}).container().appendTo($('#buttons'));
// } );
// // END LIST TABLES







	
	
/* $(document).ready(function () {
$('#sidebar ul li a').click( function(){
    if ( $('#sidebar ul li a').removeClass('collapsed') ) {
        $('#sidebar ul li ul').removeClass('in');
    } else {
        $('li a.current').removeClass('current');
        $(this).addClass('current');    
    }
});
}); */

	
	
	/* $(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar ul li a').addClass('collapse');
			$('.collapse').collapse('show');
		});
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar ul li a').removeClass('collapse');
			$('.collapse').collapse('hide');
		});
	});
	 */
	

/* $(document).on('click',function(){
    $('.collapse').collapse('hide');
}) */
// END LEFT MENU






// CIRCLE FOR SCORE
$('#delivering_circle').circleProgress({
    value: 0.9,
	size: 200.0,
	emptyFill: '#ccc',
	fill: {gradient: ['#B01116', '#B01116']}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html('<span>3.6</span> Overall Average<br>Score');
  });
$('#Opportunistic_circle').circleProgress({
    value: 0.725,
	size: 140.0,
	emptyFill: '#ccc',
	fill: {gradient: ['#000', '#000']}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html('<span>2.9</span>');
  });
  $('#Empathetic_circle').circleProgress({
    value: 0.95,
	size: 140.0,
	emptyFill: '#ccc',
	fill: {gradient: ['#000', '#000']}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html('<span>3.8</span>');
  });
   $('#Progressive_circle').circleProgress({
    value: 0.925,
	size: 140.0,
	emptyFill: '#ccc',
	fill: {gradient: ['#000', '#000']}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html('<span>3.7</span>');
  });
  $('#Communication_circle').circleProgress({
    value: 1.0,
	size: 140.0,
	emptyFill: '#ccc',
	fill: {gradient: ['#000', '#000']}
  }).on('circle-animation-progress', function(event, progress) {
     $(this).find('strong').html('<span>4.0</span>');
  });

$('#receiving_circle').circleProgress({
    value: 0.525,
	size: 200.0,
	emptyFill: '#ccc',
	fill: {gradient: ['#B01116', '#B01116']}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html('<span>2.1</span>Overall Average <br>Score');
  });
$('#Regulation_circle').circleProgress({
    value: 0.975,
	size: 140.0,
	emptyFill: '#ccc',
	fill: {gradient: ['#000', '#000']}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html('<span>3.9</span>');
  });
  $('#Reactive_circle').circleProgress({
    value: 0.175,
	size: 140.0,
	emptyFill: '#ccc',
	fill: {gradient: ['#000', '#000']}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html('<span>0.7</span>');
  });
   $('#Contingent_circle').circleProgress({
    value: 0.325,
	size: 140.0,
	emptyFill: '#ccc',
	fill: {gradient: ['#000', '#000']}
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html('<span>1.3</span>');
  });
  $('#Solicitation_circle').circleProgress({
    value: 0.725,
	size: 140.0,
	emptyFill: '#ccc',
	fill: {gradient: ['#000', '#000']}
  }).on('circle-animation-progress', function(event, progress) {
     $(this).find('strong').html('<span>2.9</span>');
  });
  $('#Evidential_circle').circleProgress({
    value: 0.375,
	size: 140.0,
	emptyFill: '#ccc',
	fill: {gradient: ['#000', '#000']}
  }).on('circle-animation-progress', function(event, progress) {
     $(this).find('strong').html('<span>1.5</span>');
  });
// END CIRCLE FOR SCORE

// SWEETALERT 
$('#submit_assessment').on('click', function () {
swal({
  title: "Thank You!",
  text: "Your Feedback is Submitted Successfully.",
  type: "success",
  timer: 4000,
  showConfirmButton: false
}, function(){
      window.location.href = "thankyou.php";
});
});
// END SWEETALERT 

// PERFECT SCROLLBAR
new PerfectScrollbar('#container');
new PerfectScrollbar('.scroll_notification');
new PerfectScrollbar('.scroll_notification1');

// END PERFECT SCROLLBAR

// DASHBOARD TABLES
$(document).ready(function() {
	var table = $('#dashboard_tables').DataTable( {
	
					dom: 'lBfrtip',
					buttons: [
								
							]
				});
} );
// END DASHBOARD TABLES

// CHART
var chart = AmCharts.makeChart( "license_chart", {
  "type": "pie",
	"startDuration": 0,
  "dataProvider": [ {
    "title": "Remaining Licenses",
    "value": 12,
	  "color": "#B01116"
  }, {
    "title": "Assigned Licenses",
    "value": 3,
	  "color": "#000"
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,
"colorField": "color",
  "radius": "42%",
  "innerRadius": "70%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "feedback_chart", {
  "type": "pie",
	"startDuration": 0,
  "dataProvider": [ {
    "title": "Completed Feedback",
    "value": 7,
	  "color": "#000"
  }, {
    "title": "Incompleted Feedback",
    "value": 3,
	  "color": "#B01116"
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,
"colorField": "color",
  "radius": "42%",
  "innerRadius": "70%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );
// END CHART

//LINE CHART START
//INVITATION CHART
var chart = AmCharts.makeChart("clientinvitation_chart", {
    "type": "serial",
    "theme": "none",
	"dataProvider": [{
        "month": "January",
        "value": 6
    }, {
        "month": "February",
        "value": 9
    }, {
        "month": "March",
        "value": 2
    }, {
        "month": "April",
        "value": 0
    }, {
        "month": "May",
        "value": 8
    }, {
        "month": "June",
        "value": 12
    }, {
        "month": "July",
        "value": 18
    }, {
        "month": "August",
        "value": 2
    }, {
        "month": "September",
        "value": 7
    }, {
        "month": "October",
        "value": 1
    }, {
        "month": "November",
        "value": 10
    }, {
        "month": "December",
        "value": 6
    }],
    "valueAxes": [{
        "integersOnly": true,
		"precision" : 0,
        "axisAlpha": 1,
        "dashLength": 0,
        "gridCount": 0,
		"gridAlpha": 0,
        "position": "left",
        "labelsEnabled": true,
		"gridThickness": 0
    }],
    "startDuration": 0,
    "graphs": [{
        "balloonText": "[[month]]<br>Invitation : [[value]]",
        "bullet": "round",
        "title": "",
        "valueField": "value",
		"fillAlphas": 0,
		"precision" : 0,
		"lineColor": "#b11016",
		"lineThickness": 2,
		"lineAlpha": 1,
    }],
    "chartCursor": {
        "cursorAlpha": 0,
        "zoomable": false,
		"valueZoomable": false,
		"valueLineBalloonEnabled": false,
		"valueLineEnabled": false,
    },
    "categoryField": "month",
   "categoryAxis": {
		"gridPosition": "start",
		"precision" : 0,
        "axisAlpha": 1,
        "dashLength": 0,
        "gridCount": 0,
		"gridAlpha": 0,
        "position": "bottom",
        "labelsEnabled": true,
		"gridThickness": 0,
		"autoGridCount": 0,
		"axisColor" : "red",
	}
});

//INVITATION CHART
//LICENSE PACK CHART
var chart = AmCharts.makeChart("licensepack_chart", {
    "type": "serial",
    "theme": "none",
	"dataProvider": [{
        "month": "January",
        "value": 6
    }, {
        "month": "February",
        "value": 9
    }, {
        "month": "March",
        "value": 2
    }, {
        "month": "April",
        "value": 0
    }, {
        "month": "May",
        "value": 8
    }, {
        "month": "June",
        "value": 12
    }, {
        "month": "July",
        "value": 18
    }, {
        "month": "August",
        "value": 2
    }, {
        "month": "September",
        "value": 7
    }, {
        "month": "October",
        "value": 1
    }, {
        "month": "November",
        "value": 10
    }, {
        "month": "December",
        "value": 6
    }],
    "valueAxes": [{
        "integersOnly": true,
		"precision" : 0,
        "axisAlpha": 1,
        "dashLength": 0,
        "gridCount": 0,
		"gridAlpha": 0,
        "position": "left",
        "labelsEnabled": true,
		"gridThickness": 0
    }],
    "startDuration": 0,
    "graphs": [{
        "balloonText": "[[month]]<br>License Pack : [[value]]",
        "bullet": "round",
        "title": "",
        "valueField": "value",
		"fillAlphas": 0,
		"precision" : 0,
		"lineColor": "#000",
		"lineThickness": 2,
		"lineAlpha": 1,
    }],
    "chartCursor": {
        "cursorAlpha": 0,
        "zoomable": false,
		"valueZoomable": false,
		"valueLineBalloonEnabled": false,
		"valueLineEnabled": false,
    },
    "categoryField": "month",
   "categoryAxis": {
		"gridPosition": "start",
		"precision" : 0,
        "axisAlpha": 1,
        "dashLength": 0,
        "gridCount": 0,
		"gridAlpha": 0,
        "position": "bottom",
        "labelsEnabled": true,
		"gridThickness": 0,
		"autoGridCount": 0,
		"axisColor" : "red",
	}
});
//LICENSE PACK CHART
//LINE CHART END
