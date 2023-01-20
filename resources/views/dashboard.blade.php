@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

	<div class="col-lg-9 col-md-9 col-12 px-0">

		<div class="admin-dashboard">
			<header>
				<div class="admin-short-info">
					<h2>Hello, @if(!empty($user->first_name)){{$user->first_name}}@endif</h2>
				</div>
				<div class="admin-full-info">
					<div class="admin-text">
						<h5>@if(!empty($user->first_name)){{$user->first_name}}@endif @if(!empty($user->last_name)){{$user->last_name}}@endif</h5>
						<p><span>@</span>@if(!empty($user->username)){{$user->username}}@endif</p>
						<a href="{{route('profile')}}">@if(!empty($user->user_role)){{$user->user_role}}@endif</a>
					</div>
					<div class="admin-media">
						<a href="{{route('profile')}}"><img src="@if(!empty($user->profile_picture)){{$user->profile_picture}}@endif" class="img-fluid" /></a>
					</div> 
					<div class="admin-support">
						<a href="{{route('support')}}"><button class="support-btn" name="admin_support">Support <i class="fa-sharp fa-solid fa-arrow-right"></i></button></a>
					</div>
				</div>
			</header>
			
			<div class="admin-dashboard-panel">
				<div class="admin-welcome-panel">
					<h2>Welcome to your Arabians@Home Dashboard</h2>
				</div>
			</div>     
						
		</div>

	</div>

<!----YOUR-CODE-HERE----->
@endsection