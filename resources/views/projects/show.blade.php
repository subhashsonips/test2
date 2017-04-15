
     
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
            <span class="sml"><strong>{{ $projectClient['name'] }}</strong></span><br>
            {{ $projectData->prj_title }}
          </span><br>
           <span class="sml">{{ $projectData->prj_end_date }}  |  {{ $projectData->prj_type }}</span>
              <div class="pull-right">
            <i class="fa fa-clock-o"></i><span class="big"> 50</span> hour worked &nbsp;&nbsp;&nbsp;
            <i class="fa fa-calendar"></i><span class="big"> 8</span> Days to go  </div>
            </div>
          <div class="progress-wrap progress" data-toggle="tooltip" title="" data-progress-percent="50" data-original-title="50% Completed">
          <div class="progress-bar progress" style="left: 439.891px;"></div>
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
                <?php 
                foreach ($pendingTasks as $key => $task) {
                  ?>
                  <tr class="taskItem">
                  <td>
                     <div class="checkbox">
                            <label>
                              <input type="checkbox" value="<?= $task->id ?>" class="taskStatus">
                              <span class="cr"><i class="cr-icon fa fa-check"></i></span>                            
                            </label>
                      </div>
                  </td>
                  <td>
                    <a href="#editTask" data-toggle="modal" class="blackLink">
                      <?php echo $task->task_name; ?>
                    </a>
                  </td>
                  <td><?php echo date('d M Y', strtotime($task->start_date)) . "  -  " .date('d M Y', strtotime($task->end_date));
                   ?></td>
                  <td><a href="#" data-toggle="tooltip" title="Not started yet"><span class="circle greybg"></span> </a></td>
                </tr>
              <?php }

                ?>
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
                @foreach($completedTasks as $key => $task) 
                <tr class="taskItem">
                  <td><div class="checkbox">
                          <label>
                            <input type="checkbox" checked="" class="taskStatus" value="<?= $task->id; ?>">
                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                           
                          </label>
                       </div></td>
                  <td>{{ $task->task_name }}</td>
                  <td>{{ date('d M Y', strtotime($task->completed_at)) }}</td>
                  <td><span class="orange-text">3 Days late</span></td>
                </tr>
                @endforeach
                </tbody>
              </table>
              </div>
              <div class="activity tmarg">
                <h3>Team Activity <a href="javascript:;"  class="pull-right" data-toggle="modal" data-target="#Addteam"><i class="fa fa-plus"></i> Add team</a>                
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
            
              <div class="modal fade" tabindex="-1" role="dialog" id="Addteam">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                  <form action="{{ url('/projects/') }}/{{ $projectData->id }}" id="AddTeamForm" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Team Member</h4>
                    </div>
                    <div class="modal-body">
                    
                      {{ method_field('PUT') }}
                      {{ csrf_field() }}
                       <div class="form-group">
                           <label>Member </label>
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
        <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
    $(".chosen-select").chosen({ width:"100%" });
    </script>