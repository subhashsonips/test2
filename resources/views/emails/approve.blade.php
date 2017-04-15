<div class="container">
	<div class="row">
	<div class="">
		<p>Hello {{ $user_org }}</p>
		<p>Your sign up request has been approved. You can login using the below credentials</p> 
		<p> Please  click on   <a href="{{ $login_url }}">Login</a></p>
		<p> user: {{ $con_person_email }}  </p>
        <p> pass:{{ $duplicate_pass }} </p>

	</div>	
	<table class="table">
			

	</table>
	</div>
</div>