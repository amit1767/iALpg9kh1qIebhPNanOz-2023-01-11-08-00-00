@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

	<div class="col-lg-9 col-md-9 col-12 px-0">

		<div class="admin-dashboard users-panel">
			<header>
				<div class="admin-short-info">
					<h2>My Profile</h2>
				</div>
				<div class="admin-full-info">
					<div class="admin-text">
					<h5>{{$user->first_name}} {{$user->last_name}}</h5>
						<p><span>@</span>{{$user->username}}</p>
						<a href="{{route('profile')}}">Admin</a>
					</div>
					<div class="admin-media">
						<a href="{{route('profile')}}"><img src="assets/images/bart.jpg" class="img-fluid" /></a>
					</div>
					<div class="admin-support">
						<a href="support.html"><button class="support-btn" name="admin_support">Support <i class="fa-sharp fa-solid fa-arrow-right"></i></button></a>
					</div>
				</div> 
			</header>
			
			<div class="admin-dashboard-panel">
				<div class="user-personal-panel">
					<form>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="personal-form">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-12">
											<div class="form-group">
												<div class="user-media">
													<img src="assets/images/bart.jpg" class="user-thumb img-fluid" />
													<input type="file" class="action-control" />
													<span><img src="assets/images/icon-edit.svg" class="img-fluid" /></span>
												</div>
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-12">
											<div class="form-group">
												<input type="text" name="user_first_name" class="action-control" value="Bart" placeholder="First Name" />
												<input type="text" name="user_last_name" class="action-control" value="Van Buggenhout" placeholder="Last Name" />
											</div>
											<div class="form-group">
												<div class="user-types">
													<select name="user_type" class="action-control">
														<option>Admin</option>
													</select>
													<img src="assets/images/chevron-down.png" class="img-fluid" />
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-12 mt-3">
											<div class="form-group">
												<textarea name="user_bio" class="action-control" placeholder="Description"></textarea>
											</div>
											<div class="form-group mt-3">
												<div class="user-types">
													<select name="user_type" class="action-control">
														<option>Belgium</option>
													</select>
													<img src="assets/images/chevron-down.png" class="img-fluid" />
												</div>
												<input type="email" name="user_email" class="action-control" value="bart@arabiansathome.com" placeholder="Email" />
												<input type="text" name="user_number" class="action-control" value="+31 123 456 7890" placeholder="Mobile No." />
											</div>
											<div class="form-group mt-3">
												<input type="text" name="user_name" class="action-control" value="Bart.Arabians" placeholder="Username" />
												<input type="password" name="user_password" class="action-control" value="" placeholder="Type to change Password" />
												<input type="password" name="user_confirm_password" class="action-control" value="" placeholder="Repeat new Password" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="user-listing-panel">
									<div class="user-other-info">
										<div class="form-group">
											<ul>
												<li>
													<div class="form-switch">
														<label class="form-check-label" for="StraightEgyptians">Straight Egyptians</label>                           
														<input class="form-check-input" type="checkbox" role="switch" id="StraightEgyptians" />                                             
													</div>
												</li>
												<li>
													<div class="form-switch">
														<label class="form-check-label" for="performance">Performance</label>                                                  
														<input class="form-check-input" type="checkbox" role="switch" id="performance" />                                             
													</div>
												</li>
												<li>
													<div class="form-switch">
														<label class="form-check-label" for="show">Show</label>
														<input class="form-check-input" type="checkbox" role="switch" id="show" />                                             
													</div>
												</li>
												<li>
													<div class="form-switch">
														<label class="form-check-label" for="stallions">Stallions</label> 
														<input class="form-check-input" type="checkbox" role="switch" id="stallions" />                                             
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="form-group mb-2">
										<button class="save-btn" name="user_save_data">Save Changes <i class="fa-sharp fa-solid fa-arrow-right"></i></button>
									</div>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>                  
		</div>

	</div>

<!----YOUR-CODE-HERE----->
@endsection