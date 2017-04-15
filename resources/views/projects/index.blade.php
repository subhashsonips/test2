@extends('layouts.default')

@section('content')
<!-- Add Project Form-->
  <div id="addProject" style="display:none;">
    <div class="new">
     <div class="new-wrapper"> 			
       <div class="container">
        <div class="row">
         <form class="addProjectForm" action="{{ url('/projects/') }}" method="POST">
         {{  csrf_field() }}
           <h3 class="col-md-12">Add New Project</h3>
           <div class="col-md-6">
            <div class="form-group">
              <label>Client</label>
              <select class="chosen-select" name="client_id" style="width:100%;" required>
               <option value="">Select Client</option>
               <?php 
               	foreach ($allclient as $key => $client) {
               		# code...
               		echo '<option value="'.$client->id .'">'.$client->name .'</option>';
               	}
                ?>
             </select>
           </div>
           <div class="form-group">
            <label>Project Title</label>
            <input class="inpt" placeholder="Title" name="prj_title" type="text" required>
          </div>
          <div class="form-group">
            <label>Start Date</label>
            <input class="inpt" id="inputStartDate" name="prj_start_date" placeholder="Start Date" type="text">
          </div>
        </div><!--col-md-6-->
        <div class="col-md-6">
          <div class="form-group">
           <label>Project Type</label>
           <select class="chosen-select" name="prj_type" style="width:100%;" required>
             <option value="">Select</option>
             <option value="Custom Application">Custom Application</option>
             <option value="Website Developement">Website Developement</option>
           </select>
         </div>
         <div class="form-group">
          <label>Project Folder URL</label>
          <input class="inpt" name="prj_folder_url" placeholder="Drive URL" type="text" required>
        </div>
        <div class="form-group">
          <label>Estimated End Date</label>
          <input class="inpt" id="inputEndDate" placeholder="Estimated End Date" name="prj_end_date" type="text" required>
        </div>
      </div><!--col-md-6-->
      <div class="col-md-12 tmarg text-right">
       <button type="submit" class="btn-dark">Submit</button> &nbsp;&nbsp;   
       <button onclick="$('#addProject').hide();" type="button" class="btn-light">Cancel</button>
     </div><!--col-md-12-->
   </form>
 </div><!--row-->
</div><!--container-->
</div><!--new-wrapper-->
</div><!--new-->
</div>
<!--add task-->
 <div id="addTask" style="display:none;">
 	<div class="new">
 		<div class="new-wrapper"> 			
 			 <div class="container">
 			  <div class="row tmarg">
 			    <h3 class="col-md-12">Add Tasks</h3>
 			     <div class="col-md-12">
		           <form class="form-inline" action="{{ url('/tasks') }}" method="POST" id="addTaskForm">
		           {{ csrf_field() }}
		            <input type="hidden" name="prj_id" value="<?php echo $allproject[0]->id; ?>" />
		            <input type="hidden" id="taskCount" value="2" />
		         <div class="task-list">	
		          <div class="task-row">		           
                    <div class="form-group" style="width:50%">
                        <input class="inpt" class="inputTask" name="task[0][task_name]" placeholder="Enter task.." type="text" required>
                    </div>
                    <div class="form-group" style="width:40%">
                        <input class="inpt inputDateRange"  placeholder="Date Range" type="text">
                        <input type="hidden" name="task[0][start_date]" class="start_date" /> 
                		  <input type="hidden" name="task[0][end_date]" class="end_date" />
                    </div>
                  
                 </div><!--task-row-->
                  <div class="task-row extra-1">
                    <div class="form-group" style="width:50%">
                        <input class="inpt" class="inputTask" name="task[1][task_name]" placeholder="Enter task.." type="text" required>
                    </div>
                    <div class="form-group" style="width:40%">
                        <input class="inpt inputDateRange" placeholder="Date Range" type="text">
                        <input type="hidden" name="task[1][start_date]" class="start_date" /> 
                		  <input type="hidden" name="task[1][end_date]" class="end_date" />
                    </div>
                    <button class="btn-sm" type="button" onclick="removetask(1)"><i class="fa fa-trash"></i></button>
                 </div><!--task-row-->
                 </div><!-- task-list-->
                <div class="form-input text-center">
                <button type="button" class="btn-sm" onclick="addtask();"><i class="fa fa-plus"></i></button>
                </div>
                <div class="form-group tmarg text-right">
                 <button type="submit" class="btn-dark">Submit</button> &nbsp;&nbsp;   
                 <button onclick="$('#addTask').hide();" type="submit" class="btn-light">Cancel</button>
               </div>   
          </form>
          </div><!--col-md-12-->
        </div><!--row-->
      </div><!--container-->
 		</div><!--new-wrapper-->
 	</div><!--new-->
 </div>
 <!--/add task-->
 <div id="editTask" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title">Edit Task</h3>
                </div>
                <div class="modal-body">
                   <form>
                      <div class="form-group">
                         <label>Task</label>
                         <input class="inpt" id="" placeholder="Task" type="text">
                      </div>
                      <div class="form-group">
                         <label>Date</label>
                         <input class="inpt" id="" placeholder="Date" type="text">
                      </div>
                      <div class="form-group text-right tmarg">
                      	 <button type="button" class="btn-light" data-dismiss="modal">Close</button>&nbsp;&nbsp;
                    <button type="button" class="btn-dark">Save</button>
                      </div>
                   </form>
                </div><!--modal-body-->
                <div class="modal-footer">
                  <h3 class="text-left"> <a href="" class="orange-text">Delete this task</a></h3>
                </div><!--modal-footer-->
            </div><!--modal-cotent-->
        </div><!--modal-dialog-->
    </div><!--modal-->
<!--/edit single task-->
<section id="contents" class="burger">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
       <div class="sidebar-wrapper">
        <div class="sidebar-header">
        	<h4 class="">Projects
             <a href="javascript:;" onclick="$('#addProject').slideToggle('right');" class="pull-right"><i class="fa fa-plus"></i> Project</a>   
        	</h4>
        </div>
       	<div class="sidebar-search">
       		<form>
       			<input type="text" placeholder="Search projects..." class="inpt search">
       		</form>       	
       	</div>
        	<div class="project-menu">
					<ul class="nav">
						<?php
							foreach ($allproject as $key => $project) { 

                ?>
						   <li class="<?php if($key==0) echo "active"; ?>" >
							<a href="#" class="prj-list" data-id="<?= $project->id; ?>">
								<span class="sml"><strong><?= $project->client['name']; ?></strong></span><br>
							 	<?= $project->prj_title; ?>
							 </a>							 
						    </li>
				<?php }
						 ?>
					</ul>
				</div>
      
       </div>
      </div>
      <div class="col-md-8" id="projectContent">
      	<div class="content-wrapper">
      	 <div class="content-header">
	      	 <div class="actions">
	      	    <div class="dropdown-dot">

                  <!-- trigger button -->
                  <button>• • •</button>

                  <!-- dropdown menu -->
                  <ul class="dropdown-menu">
                      <li><a href="#home">Edit</a></li>
                      <li><a href="#about">Mark as Complete</a></li>
                      <li><a href="#contact">Mark as Canceled</a></li>
                      <li><a href="#home">Delete</a></li>     
                      <li><a href="#" style="background:#3A97E0; color:#FFF;">Go to Drive</a></li>
                  </ul>
              </div>
	          </div>
      		<span class="p-title">

      			<span class="sml"><strong>{{ $allproject[0]->client['name'] }}</strong></span><br>
						{{ $allproject[0]->prj_title }}
      		</span><br>
      		 <span class="sml">{{ $allproject[0]->prj_end_date }}  |  {{ $allproject[0]->prj_type }}</span>
      	     	<div class="pull-right">
      		  <i class="fa fa-clock-o"></i><span class="big"> 50</span> hour worked &nbsp;&nbsp;&nbsp;
      		  <i class="fa fa-calendar"></i><span class="big"> 8</span> Days to go  </div>
      		  </div>
      		<div class="progress-wrap progress" data-toggle="tooltip" title="50% Completed" data-progress-percent="50">
  				<div class="progress-bar progress"></div>
			</div>
      		  <div class="content-list">
      		  <h3> Pending
              <a href="javascript:;" onclick="$('#addTask').slideToggle('right');" class="pull-right"><i class="fa fa-plus"></i> Tasks</a>

      		  </h3>
      		  	<table class="table taskListPending">
      		  		<thead>
      		  		 <tr>
      		  			<th>#</th>
      		  			<th>Task Name</th>
      		  			<th>Date Range</th>
      		  			<th>Status</th>
      		  		 </tr>
      		  		</thead>
      		  		<tbody>
      		  		<?php 	foreach ($pendingTasks as $key => $task) {	  

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
      		  			<td>
                         <div class="checkbox">
	                          <label>
	                            <input type="checkbox" value="<?= $task->id; ?>" class="taskStatus">
	                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
	                           
	                          </label>
                      	 </div>
                      	 </td>
      		  			<td>
                      <a href="#editTask" data-toggle="modal" class="blackLink">
      		  			     	<?php echo $task->task_name; ?>
      		  			   </a>
                  </td>
      		  			<td><?php echo date('d M Y', strtotime($task->start_date)) . " - " . date('d M Y', strtotime($task->end_date));
      		  			 ?></td>
      		  			<td><a href="#" data-toggle="tooltip" title="{{ $title }}"><span class="{{ $statusClass }}"></span> </a></td>
      		  		</tr>
      		  	<?php	}  		?>
      		  		
      		  		</tbody>
      		  	</table>
      		  	<h3>Completed </h3>
      		  	<table class="table taskListCompleted">
      		  		<thead>
      		  		 <tr>
      		  			<th>#</th>
      		  			<th>Task Name</th>
      		  			<th>Completion Date</th>
      		  			<th>Remark</th>
      		  		 </tr>
      		  		</thead>
      		  		<tbody>
                <?php  foreach ($completedTasks as $key => $task) {

                $remark = '';  $statusClass = ''; $rClass = '';      
                  $date3 = date_create($task->completed_at);
                  $date4 = date_create($task->end_date);
                   $checked = '';
                  $diff2 = date_diff($date3,$date4);
                  
                   if(strtotime($task->completed_at) > strtotime($task->end_date))
                   {
                      $remark = $diff2->days . " Days late";
                       $rClass = 'orange-text';
                   }
                  else if(strtotime($task->completed_at) < strtotime($task->end_date))
                  {
                     $remark = $diff2->days . " Days Early";
                     $rClass = 'green-text';
                  }
                  else
                  {
                     $remark ="On Time";
                      $rClass = 'green-text';
                  }
                  ?>
      		  		<tr class="taskItem">
      		  			<td><div class="checkbox">
                          <label>
                            <input type="checkbox" class="taskStatus" checked="" value="<?= $task->id ?>">
                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>                           
                          </label>
                       </div></td>
      		  			<td><?= $task->task_name; ?></td>
      		  			<td><?= date('d M Y', strtotime($task->completed_at)); ?></td>
      		  			<td><span class="{{ $rClass }}">{{ $remark }}</span></td>
      		  		</tr>
      		  		<?php } ?>
      		  		</tbody>
      		  	</table>
      		  	</div>
      		  	<div class="activity tmarg">
      		  	<h3>Team Activity<a href="javascript:;"  class="pull-right" data-toggle="modal" data-target="#Addteam"><i class="fa fa-plus"></i> Add team</a>
              </h3>
      		  	<div class="media">
                    <a href="#" class="pull-left">
                        <img src="images/avtar.jpg" class="media-object" alt="Sample Image" width="60">
                    </a>
                    <div class="media-body">
                        <p class="media-heading"><strong>John Doe</strong> <span class="sml">Software Developer</span>
                          <span class="pull-right"><span class="p-title">85</span> hrs</span>
                        </p>
                        
                        <p class="sml">Last worked on <strong>Sign up, Login, Forgot Password</strong> on 25 Dec 2016</p>
                    </div>
                </div>
                <div class="media">
                    <a href="#" class="pull-left">
                        <img src="images/avtar.jpg" class="media-object" alt="Sample Image" width="60">
                    </a>
                    <div class="media-body">
                        <p class="media-heading"><strong>John Doe</strong> <span class="sml">Software Developer</span>
                          <span class="pull-right"><span class="p-title">85</span> hrs</span>
                        </p>
                        
                        <p class="sml">Last worked on <strong>Sign up, Login, Forgot Password</strong> on 25 Dec 2016</p>
                    </div>
                </div>
                <div class="media">
                    <a href="#" class="pull-left">
                        <img src="images/avtar.jpg" class="media-object" alt="Sample Image" width="60">
                    </a>
                    <div class="media-body">
                        <p class="media-heading"><strong>John Doe</strong> <span class="sml">Software Developer</span>

                          <span class="pull-right"><span class="p-title">85</span> hrs</span>
                        </p>
                        
                        <p class="sml">Last worked on <strong>Sign up, Login, Forgot Password</strong> on 25 Dec 2016</p>
                    </div>
                </div>
      		  </div>
              <!-- Add team Model-->
            <div class="modal fade" tabindex="-1" role="dialog" id="Addteam">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                    <form action="{{ url('/projects/') }}/{{ $allproject[0]->id }}" id="AddTeamForm" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Team Member</h4>
                    </div>
                    <div class="modal-body">
                    {{ method_field('PUT') }}
                     {{  csrf_field() }}
                       <div class="form-group">
                           <label>Member</label>
                          <select name="team_member[]" class="chosen-select" required multiple="multiple">
                              <?php 
                                foreach ($allteam as $key => $mem) {
                                    
                                   echo '<option value="'. $mem->id .'">'. $mem->name . '</option>';   
                                     }
                              ?>
                          </select>
                       </div>               
                   </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn-dark">Add</button>
                      </div>
                             </form>
                         </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
      	    </div>
      	</div>
      	
      </div>
    </div>
  </div>
</section>
 
<div class="overlay" style="display:none">
	<div class="loader"></div>
</div>
<script>
// on page load...
    moveProgressBar();
    // on browser resize...
    $(window).resize(function() {
        moveProgressBar();
    });

    // SIGNATURE PROGRESS
    function moveProgressBar() {
      console.log("moveProgressBar");
        var getPercent = ($('.progress-wrap').data('progress-percent') / 100);
        var getProgressWrapWidth = $('.progress-wrap').width();
        var progressTotal = getPercent * getProgressWrapWidth;
        var animationLength = 2500;
        
        // on page load, animate percentage bar to data percentage length
        // .stop() used to prevent animation queueing
        $('.progress-bar').stop().animate({
            left: progressTotal
        }, animationLength);
    }
    function addtask()
    {
     taskCount = parseInt($("#taskCount").val());
     count = parseInt(taskCount);
    	var add = '<div class="task-row extra-'+ count  +'"><div class="form-group" style="width:50%"><input class="inpt" class="inputTask" name="task['+ count +'][task_name]" placeholder="Enter task.." type="text" required></div> <div class="form-group" style="width:40%"><input class="inpt inputDateRange" placeholder="Date Range" type="text"><input type="hidden" name="task['+ count +'][start_date]" class="start_date" /><input type="hidden" name="task['+ count +'][end_date]" class="end_date" /></div>  <button class="btn-sm" type="button" onclick="removetask('+ count +')"><i class="fa fa-trash"></i></button></div>';
    	$(".task-list").append(add);
   	 	$("#taskCount").val(count+1);
   	 	$('#addTaskForm input.inputDateRange').daterangepicker({
		      autoUpdateInput: false,
		      locale: {
		          cancelLabel: 'Clear'
		      }
		  });
   	 	 $('#addTaskForm input.inputDateRange').on('apply.daterangepicker', function(ev, picker) {
		      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		      $(this).parent().find("input.start_date").val(picker.startDate.format('YYYY-MM-DD'));
		      $(this).parent().find("input.end_date").val(picker.endDate.format('YYYY-MM-DD'));
		  });

		  $('#addTaskForm input.inputDateRange').on('cancel.daterangepicker', function(ev, picker) {
		      $(this).val('');
		       $(this).parent().find("input.start_date").val('');
		       $(this).parent().find("input.end_date").val('');
		  });

    }
    function removetask(tNo)
    {
    	taskCount = $("#taskCount").val();
    	$("#taskCount").val(parseInt(taskCount) -1);    
        $(".extra-" + tNo).remove();
    }
	jQuery(document).ready(function() {
		
		$("input#inputStartDate,input#inputEndDate").daterangepicker({ 
			singleDatePicker: true,
			locale: {
            format: 'YYYY-MM-DD'
        	},
		});

		$('#addTaskForm input.inputDateRange').daterangepicker({
		      autoUpdateInput: false,
		      locale: {
		          cancelLabel: 'Clear'
		      }
		  });

		  $('#addTaskForm input.inputDateRange').on('apply.daterangepicker', function(ev, picker) {
		      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		      $(this).parent().find("input.start_date").val(picker.startDate.format('YYYY-MM-DD'));
		      $(this).parent().find("input.end_date").val(picker.endDate.format('YYYY-MM-DD'));
		  });

		  $('#addTaskForm input.inputDateRange').on('cancel.daterangepicker', function(ev, picker) {
		      $(this).val('');
		       $(this).parent().find("input.start_date").val('');
		       $(this).parent().find("input.end_date").val('');
		  });

		  $("form#addTaskForm").on('submit', function(e) {
		  	e.preventDefault();
		  	 $(".overlay").show();		
			 $.ajax({
	            type: 'post',
	            url: '{{ url('/tasks/') }}',
	            data: $('form#addTaskForm').serialize(),
				dataType: 'json',
	            success: function(data) {				
	                  if(data.status=='Y')
					  {
						  $('.taskListPending tbody').prepend(data.html);
						  $("form#addTaskForm").trigger('reset');
						  $('#addTask').hide();
						  $(".overlay").hide();
					  }
					  else {					  
						alert("Error In Adding client"); 
					  }
            }
          });

		  });

		$('#addProject form.addProjectForm').on('submit', function(e) {
		 e.preventDefault();
		 $(".overlay").show();		
		 $.ajax({
            type: 'post',
            url: '{{ url('/projects/') }}',
            data: $('#addProject form.addProjectForm').serialize(),
			 dataType: 'json',
            success: function(data) {				
                  if(data.status=='Y')
				  {
					  $('.project-menu ul.nav').prepend(data.html);
					  $("#addProject form.addProjectForm").trigger('reset');
					  $('#addProject').slideToggle('right');
					  $(".overlay").hide();
				  }
				  else {					  
					alert("Error In Adding client"); 
				  }
            }
          });
			
		});
	   $('a.prj-list').on('click', function(e) {  
	   	$(".overlay").show();
	   	 var prjId = $(this).attr('data-id');
	   	 $(".project-menu ul li").removeClass('active');
	   	 $(this).parent('li').addClass('active');
	   	 $('form#addTaskForm input[name=prj_id]').val(prjId);
	   	 	$.ajax({
	   	 		type : 'get',
	   	 		url : '{{ url('/projects/') }}' +'/'+ prjId,
	   	 		dataType : 'html',
	   	 		success: function(data)
	   	 		{
	   	 			$("#projectContent").html(data);
	   	 			$(".overlay").hide();
	   	 		}
	   	 	});


	     });
		$('#projectContent').delegate('form#AddTeamForm','submit', function(e) { 

       var url = $(this).attr('action');
         e.preventDefault();
        $(".overlay").show();    
         $.ajax({
                type: 'post',
                url: url,
                data: $(this).serialize(),
                 dataType: 'json',
                success: function(data) {       
                 if(data.status=='Y')
                   {                
                     $(".overlay").hide();
                    }
                  else {            
                    alert("Error In Adding client"); 
                  }
                }
              });
        });
    $("#projectContent").delegate('.taskListPending .taskItem input.taskStatus','change', function() {
       $(".overlay").show();    
       $(this).parents('tr.taskItem').fadeOut(500, function(){ $(this).remove(); });
      
      var status = $(this).prop('checked');
      var taskId = $(this).val();
      var token = $("input[name=_token]").val();

     $.ajax({
       type : 'post',
       url : "{{ url('/tasks/')}}" + "/" + taskId,
       data : {'status' : status,
                '_token' : token,
                '_method' : 'PUT' },
        dataType: 'html',
        success: function(data)
          {     
             $(".taskListCompleted tbody").append(data);            
             $(".overlay").hide();
          }
     }); 
    });
    $("#projectContent").delegate('.taskListCompleted .taskItem input.taskStatus','change', function() {
       $(".overlay").show();    
       $(this).parents('tr.taskItem').fadeOut(500, function(){ $(this).remove(); });      
      var status = $(this).prop('checked');
      var taskId = $(this).val();
      var token = $("input[name=_token]").val();

     $.ajax({
       type : 'post',
       url : "{{ url('/tasks/')}}" + "/" + taskId,
       data : {'status' : status,
                '_token' : token,
                '_method' : 'PUT' },
        dataType: 'html',
        success: function(data)
          {     
          $(".taskListPending tbody").append(data);         
          $(".overlay").hide();
          }
     }); 
    });
	});
    </script>
@endsection