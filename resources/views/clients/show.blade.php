 <span class="p-title">
  <span class="sml"><strong>{{ $client->name }}</strong></span><br>
		{{ $client->company }}
  </span><br>
    <span class="sml">{{ $client->country }}  |  {{ $client->email }}</span>
      	<div class="pull-right">
      	  <i class="fa fa-clock-o"></i><span class="big"> 50</span> hour worked &nbsp;&nbsp;&nbsp;
		</div>
      	<div class="line"></div>
      	  <div class="content-list">
			<h3> Projects</h3>
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
	<div id="editClient" style="display:none;">
	<div class="new">
 		<div class="new-wrapper"> 			
 			 <div class="container">
 			  <div class="row">
 			     <form class="editForm"  action="{{ url('clients/') }}/{{ $client->id }}" method="POST">
				 {{ csrf_field() }}
				 {{ method_field('PUT') }}
 			     <h3 class="col-md-12">Edit Client</h3>
 			       <div class="col-md-6">
                        <div class="form-group">
                            <label>Client Name</label>
                            <input class="inpt" placeholder="Client Name" name="name" value="{{ $client->name }}" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Company</label>
                            <input class="inpt" placeholder="Title" type="text" value="{{ $client->company }}" name="company">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="inpt" id="inputEmail" placeholder="Email" value="{{ $client->email }}" type="email" name="email" required>
                        </div>
                        
                       </div>
                        <div class="col-md-6">
                         <div class="form-group">
                            <label>Website</label>
                            <input class="inpt" placeholder="Title" type="text" value="{{ $client->website }}" name="website">
                        </div>
                         <div class="form-group">
                            <label>Skype ID</label>
                            <input class="inpt" placeholder="Title" type="text" name="skype_id" value="{{ $client->skype_id }}" required>
                        </div>
                        <div class="form-group">
                           <label>Contry</label>
                            <input name="country" type="text" class="inpt" placeholder="Country" value="{{ $client->country }}" />                            	
                        </div>

                    
                        
                       </div>
                       
                       <div class="col-md-12 tmarg text-right">
                       <button type="submit" class="btn-dark">Submit</button> &nbsp;&nbsp;   
                       <button onclick="$('#editClient').hide();" type="button" class="btn-light">Cancel</button>
                       </div>
                    </form>
                    </div>
                    </div>
 		</div>
 	</div>
	</div>