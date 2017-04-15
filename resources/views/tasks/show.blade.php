<?php  
      $remark = '';  $statusClass = ''; $rClass = '';
      
      $date3 = date_create($taskData->completed_at);
      $date4 = date_create($taskData->end_date);
     $checked = '';
      $diff2 = date_diff($date3,$date4);
      if($taskData->status === 1) { 
            $checked = 'checked="checked"';
      }
     ?>
<tr class="taskItem">
  <td>
    <div class="checkbox">
      <label>
         <input type="checkbox" class="taskStatus" {{  $checked }} value="<?= $taskData->id; ?>">
         <span class="cr"><i class="cr-icon fa fa-check"></i></span>
      </label>
      </div>
  </td>
  <?php if($taskData->status === 1) { 
      if(strtotime($taskData->completed_at) > strtotime($taskData->end_date))
      {
          $remark = $diff2->days . " Days late";
           $rClass = 'orange-text';
      }
      else if(strtotime($taskData->completed_at) < strtotime($taskData->end_date))
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
    <td>{{ $taskData->task_name }}</td>
    <td>{{ date('d M Y', strtotime($taskData->completed_at)) }}</td>
    <td><span class="{{ $rClass }}">{{ $remark }}</span></td>
      
  <?php } 
  else {
       ?>
      <td>{{ $taskData->task_name }}</td>
      <td>{{ date('d M Y',strtotime($taskData->start_date)). ' - '. date('d M Y',strtotime($taskData->end_date )) }}
      </td>
      <?php      
        if(strtotime($taskData->start_date) > strtotime(date('Y-m-d')))
        {
          $statusClass = 'circle greybg';
          $title = "Not Started Yet";
        }
        else if((strtotime($taskData->start_date) < strtotime(date('Y-m-d'))) && (strtotime($taskData->end_date) < strtotime(date('Y-m-d'))))
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
      <td><a href="#" data-toggle="tooltip" title="{{ $title }}"><span class="{{  $statusClass }}"></span> </a></td>

    <?php  } ?>
</tr>