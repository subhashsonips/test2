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
        <span class="sml"><strong><?= $memberData->designation ?></strong></span><br>
           <?= $memberData->name; ?>
    </span><br>
    <span class="sml"><?= $memberData->phone; ?>  |  <?= $memberData->email; ?></span>
             
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
