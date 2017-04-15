@extends('layouts.team')

@section('content')
  <link href="{{ url('/css/timepicker.min.css') }}" rel="stylesheet">    
  <!--apply leave-->
  <div id="applyLeave" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title">Apply Leave</h3>
        </div>
        <div class="modal-body">
         <form>
          <div class="form-group">
           <label>Type</label>
           <select class="chosen-select" style="width:100%;">
            <option value="">Select</option>
            <option value="">Custom Application</option>
            <option value="">Website Developement</option>
          </select>
        </div>
        <div class="form-group">
         <label>Date</label>
         <input class="inpt" id="" placeholder="Date" type="text">
         <p>0 Days</p>
       </div>
       <div class="form-group">
         <label>Reason</label>
         <textarea class="inpt" id="" placeholder="Reason" style="height:80px;"></textarea>
         </div>       
     </form>
   </div><!--modal body-->
   <div class="modal-footer">
     <button type="button" class="btn-light" data-dismiss="modal">Close</button>&nbsp;&nbsp;
     <button type="button" class="btn-dark">Submit</button>
   </div>

 </div><!--modal content-->
</div><!--modal-dialouge-->
</div>
<!--/apply leave-->
<section class="burger">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="sidebar-wrapper">
          <div class="sidebar-header">
            <h4 class="">Resources
             <a href="javascript:;" onclick="$('#addResource').slideToggle('right');" class="pull-right"><i class="fa fa-plus"></i> New</a>   
           </h4>
         </div><!--sidebar-header-->
         <div class="sidebar-search">
          <form>
            <input placeholder="Search knowledgebase..." class="inpt search" type="text">
          </form>
        </div><!--sidebar-earch-->
        <div class="project-menu">
          <ul class="nav">
            <li>
              <a href="#">
                Angular Material<br>
                <span class="sml"> www.angularmaterial.com </span>
              </a>
            </li>
            <li>
             <a href="#">
              Free Images<br>
              <span class="sml"> www.angularmaterial.com</span>
            </a>
          </li>
          <li>
           <a href="#">
             Free fonts<br>
             <span class="sml"> www.angularmaterial.com</span>
           </a>
         </li>
         <li>
           <a href="#">
            How to install node js<br>
            <span class="sml"> www.angularmaterial.com</span>
          </a>
        </li>
      </ul>
    </div><!--project-menu-->

  </div><!--sidebar-wrapper-->
</div><!--col-md-4-->

<div class="col-md-5">
  <div class="panel">
    <div class="panel-heading">
      <h4 class="">Timesheet</h4>
    </div>
    <div class="panel-body">
      <form class="addWorkForm" action="{{ url('/work/team-work')}}" method="POST">
      	{{ csrf_field() }}
      	<input type="hidden" name="team_id" value="{{ $teamId }}">
        <div class="row">
         <div class="col-md-6">
          	<div class="date-picker" data-date="">
                <div class="date-container text-center pull-left">                   
                    <h2><span class="date">4 Februray</span>
                    <span class="year">2017</span></h2>
                </div>
                <span data-toggle="datepicker" data-type="subtract" data-amt="1" class="fa fa-angle-left pull-left"></span>
                <span data-toggle="datepicker" data-amt="1" class="fa fa-angle-right pull-right" style="right: 5px;"></span>
                <input type="hidden" class="inputdate" name="working_date" value="" />
            </div>
          
          <div class="form-group">
            <label>Project</label>
            <select class="chosen-select"  name="project_id" style="width:100%;" required>
              <option value="">Select Project</option>
              <?php  
              	foreach ($work_prj as $key => $prj) { 
              		echo "<option value='". $prj->id . "'>" .$prj->prj_title ."</option>";	
              	}

              ?>
            
            </select>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="hrbox workhourbox"><p class="p-title">8.5</p><span>HOURS</span></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Task</label>
            <select class="chosen-select" name="task_id" style="width:100%;" required>
              <option value="">Select Task</option>
              <?php 
              	foreach ($alltask as $key => $task) {
              		echo '<option value="'. $task->id.'">'. $task->task_name . '</option>';
              	}
              ?>		
            </select>
          </div>                        
        </div>
        <div class="col-md-6">
          <div class="form-group">
           <label>Hours</label>
           <input class="inpt" id="timehour" placeholder="Hours" name="working_hour" type="text" required>
         </div>
       </div>
     </div>
     <div class="row">
       <div class="col-md-12">
         <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="" name="task_completed">
              <span class="cr"><i class="cr-icon fa fa-check"></i></span>
              Mark this task as completed.
            </label>
          </div>
        </div>
      </div>
      <div class="col-md-12 text-right">
       <button type="submit" class="btn-dark">Submit</button> &nbsp;&nbsp; 
     </div>
   </div>
 </form>
</div><!--panel-body-->
</div><!--panel-->

<div class="panel">
  <div class="panel-heading">
    <h4>Task List</h4>
  </div>
  <div class="panel-body">
    <table class="table">
      <thead>
       <tr>
        <th>#</th>
        <th>Task</th>
        <th>End Date</th>
      </tr>
    </thead>
    <tbody>
    	<?php foreach ($alltask as $key => $task) { 

    	 if(strtotime($task->start_date) > strtotime(date('Y-m-d')))
        {
          $statusClass = 'circle greybg';
          $title = "Not Started Yet";
        }
        else if((strtotime($task->start_date) < strtotime(date('Y-m-d'))) && (strtotime($task->end_date) < strtotime(date('Y-m-d'))))
        {
             $statusClass = 'circle orangebg';
             $title = "Overdue";
        }
        else
        {
          $statusClass = 'circle greenbg';
          $title = "In-progress";
        }

    		?>
    
      	<tr class="taskItem">
        <td><a href="#" data-toggle="tooltip" title="{{ $title }}"><span class="{{ $statusClass }}"></span> </a></span></td>
        <td><span class="sml"><strong>Some Awesome Project</strong></span><br>
          {{ $task->task_name }} </a></td>
          <td>{{ date('d M Y', strtotime($task->end_date)) }}</td>
        </tr>
    	<?php	}  ?>   
          </tbody>
        </table>
      </div><!--panel-body-->
    </div><!--panel-->
  </div><!--col-md-5-->

  <div class="col-md-3">
    <div class="panel">
     <div class="panel-heading">
      <h4 class="">Project Documents</h4>
    </div>
    <div class="panel-body">
     <ul class="project_folders">
     	<?php   foreach ($work_prj as $key => $prj) { ?>
     		 <li>
     	 	<span class="pull-right sml label label-primary">New</span>
     	 	<a href="#"><span class="sml"><strong>John Doe</strong></span><br>
       	{{  $prj->prj_title }}</a> 
        </li>  

     	<?php	} ?>
     	     
     </ul>
        </div><!--panel-body-->
      </div><!--panel-->

      <div class="panel">
       <div class="panel-heading">
        <h4 class="">Upcoming Bithdays</h4>
      </div>
      <div class="panel-body">
        <div class="media">
          <a href="#" class="pull-left">
            <img src="../images/avtar.jpg" class="media-object" alt="Sample Image" width="60">
          </a>
          <div class="media-body">
            <p class="media-heading"><strong>John Doe</strong> <br>
              <span class="">26 December</span>
            </p>
          </div><!--media-body-->
        </div><!--media-->
        <div class="media">
          <a href="#" class="pull-left">
            <img src="../images/avtar.jpg" class="media-object" alt="Sample Image" width="60">
          </a>
          <div class="media-body">
            <p class="media-heading"><strong>John Doe</strong> <br>
              <span class="">26 December</span>
            </p>
          </div><!--media-body-->
        </div><!--media-->
        <div class="media">
          <a href="#" class="pull-left">
            <img src="../images/avtar.jpg" class="media-object" alt="Sample Image" width="60">
          </a>
          <div class="media-body">
            <p class="media-heading"><strong>John Doe</strong> <br>
              <span class="">26 December</span>
            </p>
          </div><!--media-body-->
        </div><!--media-->
      </div><!--panel-body-->
    </div><!--panel-->

    <div class="panel">
     <div class="panel-heading">
      <h4 class="">Leaves</h4>
    </div>
    <div class="panel-body">
      <div class="media">
        <div class="media-body">
         <span class="pull-right"><span class="p-title">2</span> out of 12</span>  
         <p class="media-heading"><strong>Paid Leaves</strong> <br>
         </p>  
       </div><!--media-body-->
     </div><!--media-->

     <div class="media">
      <div class="media-body">
       <span class="pull-right"><span class="p-title">2</span> out of 6</span>  
       <p class="media-heading"><strong>Sick Leaves</strong> <br
       </p> 
     </div><!--media-body-->
   </div><!--media-->
   <div class="media">                   
    <div class="media-body text-center">
      <button href="#applyLeave" data-toggle="modal" class="btn-dark">Apply leave</button>
    </div>
  </div><!--media-->

</div><!--panel-body-->
</div><!--panel-->
</div><!--col-md-3-->

</div><!--row-->
</div><!--container-->
</section>
<div class="overlay" style="display:none">
	<div class="loader"></div>
</div>
<script type="text/javascript" src="{{ url('/js/timepicker.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		 var timepicker = new TimePicker(['timehour'], {
          theme: 'dark', // 'blue-grey'
          lang: 'en'
        });
	timepicker.on('change', function (evt) {
			  var value = (evt.hour || '00') + ':' + (evt.minute || '00');			 
			    evt.element.value = value;
			    $('.workhourbox .p-title').text(value);			 
			});


    $("form.addWorkForm").on('submit', function(e) {
    	e.preventDefault();
    	 $(".overlay").show();		
    	var url = $(this).attr('action');

    	$.ajax({ 
    		url: url,
    		type: 'post',
    		data : $('form.addWorkForm').serialize(),
    		dataType : 'json',
    		success : function(data)
    			{
    				$("form.addWorkForm").trigger('reset');
    				$(".overlay").hide();
    			}

    	}); 

     });
    $('.date-picker').each(function () {
        var $datepicker = $(this),
            cur_date = ($datepicker.data('date') ? moment($datepicker.data('date'), "YYYY/MM/DD") : moment()),
            format = {                              
                "date" : ($datepicker.find('.date').data('format') ? $datepicker.find('.date').data('format') : "D MMMM"),
                "year" : ($datepicker.find('.year').data('year') ? $datepicker.find('.weekday').data('format') : "YYYY")
            };

        function updateDisplay(cur_date) {    
          
            $datepicker.find('.date-container h2> .date').text(cur_date.format(format.date));
            $datepicker.find('.date-container h2> .year').text(cur_date.format(format.year));
            $datepicker.data('date', cur_date.format('YYYY/MM/DD'));
            $datepicker.find('.inputdate').val(cur_date.format('YYYY/MM/DD'));
        }
        
        updateDisplay(cur_date);         
        
        $datepicker.on('click', '[data-toggle="datepicker"]', function(event) {
            event.preventDefault();
            
            var cur_date = moment($(this).closest('.date-picker').data('date'), "YYYY/MM/DD"),
                date_type = ($datepicker.data('type') ? $datepicker.data('type') : "days"),
                type = ($(this).data('type') ? $(this).data('type') : "add"),
                amt = ($(this).data('amt') ? $(this).data('amt') : 1);
                
            if (type == "add") {
                cur_date = cur_date.add(date_type, amt);
            }else if (type == "subtract") {
                cur_date = cur_date.subtract(date_type, amt);
            }
            
            updateDisplay(cur_date);
        });
        
        if ($datepicker.data('keyboard') == true) {
            $(window).on('keydown', function(event) {
                if (event.which == 37) {
                    $datepicker.find('span:eq(0)').trigger('click');  
                }else if (event.which == 39) {
                    $datepicker.find('span:eq(1)').trigger('click'); 
                }
            });
        }
        
    });
});

</script>
<style type="text/css">
.date-picker,
.date-container {
    position: relative;
    display: inline-block;
    width: 90%;
    color: rgb(75, 77, 78);
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.date-container {
    padding: 0px 20px;   
}

.date-container .date {
    text-align: center;
}
.date-picker span.fa {
    position: absolute;
    font-size: 4em;
    font-weight: 100;
   
    cursor: pointer;
    top: 35%;
}
.date-picker span.fa[data-type="subtract"] {
    left: 0px;
}
.date-picker span.fa[data-type="add"] {
    right: 0px;
}

.date-picker .input-datepicker.show-input {
    display: table;
}


@media (min-width: 768px) and (max-width: 1010px) {
    .date-picker h2{
        font-size: 1.5em; 
        font-weight: 400;  
    }    
    .date-picker h4 {
        font-size: 1.1em;
    }  
    .date-picker span.fa {
        font-size: 3em;
    } 
}
</style>
@endsection
