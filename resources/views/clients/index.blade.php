@extends('layouts.default')

@section('content')
<!-- Add Client Form -->
 <div id="addClient" style="display:none;">
 	<div class="new">
 		<div class="new-wrapper"> 			
 			 <div class="container">
 			  <div class="row">
 			     <form class="tmarg"  action="{{ url('/clients') }}" method="POST">
				 {{ csrf_field() }}
 			     <h3 class="col-md-12">Add New Client</h3>
 			       <div class="col-md-6">
                        <div class="form-group">
                            <label>Client Name</label>
                            <input class="inpt" placeholder="Client Name" name="name" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Company</label>
                            <input class="inpt" placeholder="Title" type="text" name="company">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="inpt" id="inputEmail" placeholder="Email" type="email" name="email" required>
                        </div>
                        
                       </div>
                        <div class="col-md-6">
                         <div class="form-group">
                            <label>Website</label>
                            <input class="inpt" placeholder="Title" type="text" name="website">
                        </div>
                         <div class="form-group">
                            <label>Skype ID</label>
                            <input class="inpt" placeholder="Title" type="text" name="skype_id" required>
                        </div>
                        <div class="form-group">
                           <label>Contry</label>
                            <input name="country" type="text" class="inpt" />                            	
                        </div>

                    
                        
                       </div>
                       
                       <div class="col-md-12 tmarg text-right">
                       <button type="submit" class="btn-dark">Submit</button> &nbsp;&nbsp;   
                       <button onclick="$('#addClient').hide();" type="submit" class="btn-light">Cancel</button>
                       </div>
                    </form>
                    </div>
                    </div>
 		</div>
 	</div>
 </div>
 <div class="clearfix"></div>
<section id="contents" class="burger">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
       <div class="sidebar-wrapper">
        <div class="sidebar-header">
        	<h4 class="">Clients
             <a href="javascript:;" onclick="$('#addClient').slideToggle('right');" class="pull-right"><i class="fa fa-plus"></i> Client</a>   
        	</h4>
        </div>
       	<div class="sidebar-search">
       		<form>
       			<input type="text" placeholder="Search Client..." class="inpt search">
       		</form>
       	
       	</div>
        	<div class="project-menu">
					<ul class="nav client-item">
					<?php  
						foreach($clients as $i => $client)
						{ ?>
						<li class="<?php if($i==0) echo "active";  ?>">
							<a class="client-list" data-id="<?= $client->id; ?>">
							<span class="sml"><strong><?php echo $client->name; ?></strong></span><br>
							<?php echo $client->company; ?> </a>
						</li>
				 <?php }
					?>			
						
					</ul>
				</div>
      
       </div>
      </div>
      <div class="col-md-8">
      	<div class="content-wrapper">
      	 <div class="content-header">
	      	 <div class="actions">
	      	    <div class="dropdown-dot">

					<!-- trigger button -->
					<button> &#9679;&#9679;&#9679;</button>

					<!-- dropdown menu -->
					<ul class="dropdown-menu">
						<li><a href="#home" onclick="$('#editClient').slideToggle('right');" >Edit</a></li>
					  


					</ul>
				</div>
	          </div>

			<div class="client-detail">

      		<span class="p-title">
      			<span class="sml"><strong>John Doe</strong></span><br>
							Some Good Company
      		</span><br>
      		 <span class="sml">South Africa  |  john@somegoodcompany.com</span>
      	     	<div class="pull-right">
      		  <i class="fa fa-clock-o"></i><span class="big"> 50</span> hour worked &nbsp;&nbsp;&nbsp;
      		
      		  </div>
      		 <div class="line"></div>
      		  <div class="content-list">
      		  <h3> Projects
             
      		  </h3>
      		  	<table class="table">
      		  		<thead>
      		  		 <tr>
      		  			<th>#</th>
      		  			<th>Project Title</th>
      		  			<th>Hour Worked</th>
      		  			<th>Progress</th>
                  <th>Status</th>
      		  		 </tr>
      		  		</thead>
      		  		<tbody>
      		  		<tr id="taskItem">
      		  			<td>1</td>
      		  			<td><a href="#" class="blackLink">Some Awesome Project (Custom Application Development)</a></td>
      		  			<td>50 Hrs</td>
      		  			<td>80%</td>
                  <td><a href="#" data-toggle="tooltip" title="In-progress"><span class="circle greenbg"></span> </a></td>
      		  		</tr>
                <tr id="taskItem">
                  <td>1</td>
                  <td><a href="#" class="blackLink">Some Awesome Project (Custom Application Development)</a></td>
                  <td>50 Hrs</td>
                  <td>80%</td>
                  <td><a href="#" data-toggle="tooltip" title="In-progress"><span class="circle greenbg"></span> </a></td>
                </tr>
      		  		
      		  		</tbody>
      		  	</table>
      		
      		  	</div>
      		  </div>
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
	jQuery(document).ready(function() {
		
		$('#addClient form.tmarg').on('submit', function(e) {
		 e.preventDefault();
		 $(".overlay").show();
		 $.ajaxSetup({
			header:$('meta[name="_token"]').attr('content')
		});
		 $.ajax({
            type: 'post',
            url: '/project-timesheet/clients',
            data: $('#addClient form.tmarg').serialize(),
			 dataType: 'json',
            success: function(data) {				
                  if(data.status=='Y')
				  {
					  $('.project-menu ul.nav').append(data.html);
					  $("#addClient form.tmarg").trigger('reset');
					  $('#addClient').slideToggle('right');
					  $(".overlay").hide();
				  }
				  else {					  
					alert("Error In Adding client"); 
				  }
            }
          });
			
		});
		$("a.client-list").on('click', function() {
        $(".overlay").show();			
			var rowId = $(this).attr('data-id');
			$.ajax({
				type:'get',
				dataType: 'html',
				url : '{{ url('/clients/')}}' + '/'+rowId,
				success: function(data)
					{
						$(".client-detail").html(data);
						$(".overlay").hide();
					}
				
			});
		});
		$('.client-detail').on('#editClient form.editForm','submit', function(e) {
			 e.preventDefault();
			 $(".overlay").show();
			var url= $(this).attr('action'); 
			$.ajax({
            type: 'post',
            url: url,
            data: $('#editClient form.editForm').serialize(),
			dataType: 'html',
            success: function(data) {				
                 $(".client-detail").html(data);
				$(".overlay").hide(); 
            }
          });
		});
		
	});
</script>

 @endsection
