@extends('layouts.default')
<link rel="stylesheet" type="text/css" href="{{ url('/css/calendar.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('/css/custom_2.css') }}" />
@section('content')
<!--add Member-->
 <div id="addMember" style="display:none;">
 	<div class="new">
 		<div class="new-wrapper"> 			
 			 <div class="container">
 			  <div class="row">
 			     <form id="addTeamMember" method="POST" action="{{ url('/team/') }}">
 			     {{  csrf_field() }}
 			     <h3 class="col-md-12">Add Team Member</h3>
 			       <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="inpt" placeholder="Member Name" name="name" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                           <select class="chosen-select" name="designation" style="width:100%;" required="">
                              <option value="">Select</option>
                              <option value="Developer">Developer</option>
                              <option value="Team Lead">Team Lead</option>
                              <option value="Manager">Manager</option>
                              <option value="BDM">BDM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="inpt" id="inputEmail" name="email" placeholder="Email" type="email">
                        </div>
                        
                       </div>
                        <div class="col-md-6">
                         <div class="form-group">
                            <label>Phone No.</label>
                            <input class="inpt" placeholder="Phone No" type="text" name="phone">
                        </div>
                         <div class="form-group">
                            <label>Skype ID</label>
                            <input class="inpt" placeholder="Title" type="text" name="skype_id">
                        </div>
                        <div class="form-group">
                           <label>Date of Birth</label>
                            <input class="inpt datepicker" placeholder="Title" type="text" name="dob">
                        </div>

                    
                        
                       </div>
                       
                       <div class="col-md-12 tmarg text-right">
                       <button type="submit" class="btn-dark">Submit</button> &nbsp;&nbsp;   
                       <button onclick="$('#addMember').hide();" type="button" class="btn-light">Cancel</button>
                       </div>
                    </form>
                    </div>
                    </div>
 		</div>
 	</div>
 </div>
 <!--/add member-->
 <!--edit single task-->
<div id="leaveAction" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title">Leave Request</h3>
                </div>
                <div class="modal-body">
                   <form>
                      <p>Devendra Sent a live request from 12 Dec 2016 to 12 Dec 2016. </p>
                      <div class="form-group text-right tmarg">
                        
                    <button type="button" class="btn-dark">Approve</button>&nbsp;&nbsp;
                    <button type="button" class="btn-red" data-toggle="modal">Reject</button>
                      </div>
                   </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn-light" data-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
 </div>
<!--/edit single task-->
<div class="clearfix"></div>
<section id="contents" class="burger">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
       <div class="sidebar-wrapper">
        <div class="sidebar-header">
        	<h4 class="">Team
             <a href="javascript:;" onclick="$('#addMember').slideToggle('right');" class="pull-right"><i class="fa fa-plus"></i> Member</a>   
        	</h4>

        </div>
       	<div class="sidebar-search">
       		<form>
       			<input type="text" placeholder="Search team..." class="inpt search">
       		</form>
       	
       	</div>
        	<div class="project-menu">
					<ul class="nav">
					<?php foreach($allMember as $key => $member)
					  { ?>
						<li class="<?php if($key==0) echo "active";  ?>">
							<a href="#" class="team-list" data-id="<?= $member->id; ?>">
							<span class="sml"><strong><?= $member->designation; ?></strong></span><br>
							<?= $member->name ?></a>
							 </a>
						</li>
					<?php } ?>						
					</ul>
				</div>
      
       </div>
      </div>
      <div class="col-md-8">
      	<div class="content-wrapper">
      	 <div class="content-header" id="memberDetail">
	      	 <div class="actions">
	      	    <div class="dropdown-dot">
					    <!-- trigger button -->
					    <button>• • •</button>
					    <!-- dropdown menu -->
					    <ul class="dropdown-menu">
					        <li><a href="#home">Edit</a></li>
					    </ul>
				</div>
			 </div>
      		<span class="p-title">
      			<span class="sml"><strong><?= $allMember[0]->designation ?></strong></span><br>
							<?= $allMember[0]->name; ?>
      		</span><br>
      		 <span class="sml"><?= $allMember[0]->phone; ?>  |  <?= $allMember[0]->email; ?></span>
      	     
      		 <div class="line"></div>
      		  <div class="content-list">
      		  <h3> Timesheet
              <span class="pull-right"><span class="sml"> 48 Hrs</span></span>
      		  </h3>
		    <section class="main">
		        <div class="custom-calendar-wrap">
		          <div id="custom-inner" class="custom-inner">
		            <div class="custom-header clearfix">
		              <nav>
		                <span id="custom-prev" class="custom-prev"></span>
		                <span id="custom-next" class="custom-next"></span>
		              </nav>
		              <h2 id="custom-month" class="custom-month"></h2>
		              <h3 id="custom-year" class="custom-year"></h3>
		            </div>
		            <div id="calendar" class="fc-calendar-container"></div>
		          </div>
		        </div>
		     </section>
	      	<h3> Leave Requests
	             <span class="pull-right"><span class="sml"> 2 Paid | 3 Unpaid</span></span>
	        </h3>
              <table class="table">
                <thead>
                 <tr>
                  <th>#</th>
                  <th>Dates</th>
                  <th>Leave Type</th>
                  <th>Reason</th>
                  <th>Status</th>
                 </tr>
                </thead>
                <tbody>
                <tr id="taskItem">
                  <td>1</td>
                  <td>12 Dec 2016 - 12 Dec 2015 (1 Day)</td>
                  <td>Paid Leave</td>
                  <td>Out of city</td>
                  <td><button href="#leaveAction" data-toggle="modal" class="btn-dark"> Action </button></td>
                </tr>
                <tr id="taskItem">
                  <td>1</td>
                  <td>12 Dec 2016 - 12 Dec 2015 (1 Day)</td>
                  <td>Paid Leave</td>
                  <td>Out of city</td>
                  <td><i class="fa fa-check"></i> Approved</td>
                </tr>
                 <tr id="taskItem">
                  <td>1</td>
                  <td>12 Dec 2016 - 12 Dec 2015 (1 Day)</td>
                  <td>Paid Leave</td>
                  <td>Out of city</td>
                  <td><i class="fa fa-close"></i> Rejected</td>
                </tr>
                
                </tbody>
              </table>
      	 </div>
      		  	
      	</div>
     </div>
      	
      </div>
    </div>
  </div>
  <div class="overlay" style="display:none">
	<div class="loader"></div>
</div>
</section>
<script src="{{ url('js/modernizr.custom.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/jquery.calendario.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/data.js') }}"></script>

<script type="text/javascript">
    jQuery(function($) {
      
        var transEndEventNames = {
            'WebkitTransition' : 'webkitTransitionEnd',
            'MozTransition' : 'transitionend',
            'OTransition' : 'oTransitionEnd',
            'msTransition' : 'MSTransitionEnd',
            'transition' : 'transitionend'
          },
          transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
          $wrapper = $( '#custom-inner' ),
          $calendar = $( '#calendar' ),
          cal = $calendar.calendario( {
            onDayClick : function( $el, $contentEl, dateProperties ) {

              if( $contentEl.length > 0 ) {
                showEvents( $contentEl, dateProperties );
              }

            },
            caldata : codropsEvents,
            displayWeekAbbr : true
          } ),
          $month = $( '#custom-month' ).html( cal.getMonthName() ),
          $year = $( '#custom-year' ).html( cal.getYear() );

        $( '#custom-next' ).on( 'click', function() {
          cal.gotoNextMonth( updateMonthYear );
        } );
        $( '#custom-prev' ).on( 'click', function() {
          cal.gotoPreviousMonth( updateMonthYear );
        } );

        function updateMonthYear() {        
          $month.html( cal.getMonthName() );
          $year.html( cal.getYear() );
        }

        // just an example..
        function showEvents( $contentEl, dateProperties ) {
          hideEvents();          
          var $events = $( '<div id="custom-content-reveal" class="custom-content-reveal"><h4>Events for ' + dateProperties.monthname + ' ' + dateProperties.day + ', ' + dateProperties.year + '</h4></div>' ),
            $close = $( '<span class="custom-content-close"></span>' ).on( 'click', hideEvents );

          $events.append( $contentEl.html() , $close ).insertAfter( $wrapper );
          
          setTimeout( function() {
            $events.css( 'top', '0%' );
          }, 25 );

        }
        function hideEvents() {
          var $events = $( '#custom-content-reveal' );
          if( $events.length > 0 ) {            
            $events.css( 'top', '100%' );
            Modernizr.csstransitions ? $events.on( transEndEventName, function() { $( this ).remove(); } ) : $events.remove();
          }
        }      
      });
	jQuery(document).ready(function() { 
		$("input.datepicker").daterangepicker({ 
			singleDatePicker: true,
			locale: {
            format: 'YYYY-MM-DD'
        	},
		});
	$('form#addTeamMember').on('submit', function(e) {
		 e.preventDefault();
		 $(".overlay").show();		
		 $.ajax({
            type: 'post',
            url: '{{ url('/team/') }}',
            data: $('form#addTeamMember').serialize(),
			 dataType: 'json',
            success: function(data) {				
                  if(data.status=='Y')
				  {
					  $('.project-menu ul.nav').prepend(data.html);
					  $("form#addTeamMember").trigger('reset');
					  $('#addMember').hide();
					  $(".overlay").hide();
				  }
				  else {	
				    $(".overlay").hide();				  
					alert("Error In Adding client"); 

				  }
            }
          });
			
		});
	 $('a.team-list').on('click', function(e) {  
	   	$(".overlay").show();
	   	 var teamId = $(this).attr('data-id');
	   	 $(".project-menu ul li").removeClass('active');
	   	 $(this).parent('li').addClass('active');
	   	
	   	 	$.ajax({
	   	 		type : 'get',
	   	 		url : '{{ url('/team/') }}' +'/'+ teamId,
	   	 		dataType : 'html',
	   	 		success: function(data)
	   	 		{
	   	 			$("#memberDetail").html(data);
	   	 			$(".overlay").hide();
	   	 		}
	   	 	});


	     });
	});
	  
</script>
@endsection
