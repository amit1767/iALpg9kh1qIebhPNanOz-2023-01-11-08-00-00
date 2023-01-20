@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

	<div class="col-lg-9 col-md-9 col-12 px-0">

		<div class="admin-dashboard">
			<header>
				<div class="admin-short-info">
					<h2>Hello, Bart</h2>
				</div>
				<div class="admin-full-info">
					<div class="admin-text">
						<h5>{{$user->first_name}} {{$user->last_name}}</h5>
						<p><span>@</span>{{$user->username}}</p>
						<a href="{{route('profile')}}">Admin</a>
					</div>
					<div class="admin-media">
						<a href="{{route('profile')}}"><img src="{{asset('assets/images/bart.jpg')}}" class="img-fluid" /></a>
					</div>
					<div class="admin-support">
						<button class="support-btn" name="admin_support">Support <i class="fa-sharp fa-solid fa-arrow-right"></i></button>
					</div>
				</div> 
			</header>
			
			<div class="admin-dashboard-panel">
				<div class="admin-welcome-panel">
					<h2>Questions or Suggestions? <br /> Reach out!</h2>
					<p>Leave us your question. We will reply a.s.a.p.</p>
					<form class="support-form">
						<div class="form-group">
							<input type="text" placeholder="Your Title*" />
							<textarea placeholder="Your Message*"></textarea>
							<input type="checkbox" /> <label>I have read and agree to the <a href="#">terms & Conditions</a></label>
							<button class="save-btn" name="send_message">Send Message <i class="fa-sharp fa-solid fa-arrow-right"></i></button>
						</div>
					</form>
				</div>
			</div>                  
		</div>

	</div>

<!----YOUR-CODE-HERE----->
@endsection