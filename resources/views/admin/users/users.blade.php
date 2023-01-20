@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

	<div class="col-lg-9 col-md-9 col-12 px-0">

		<div class="admin-dashboard users-panel">
			<header>
				<div class="admin-short-info">
					<h2>Users <span> <a href="new-user.html" class="user-new-btn">New</a></span></h2>
				</div>
				<div class="admin-full-info">
					<div class="admin-text">
						<h5>Bart van Buggenhout</h5>
						<p>@BartArabians</p>
						<a href="admin-profile.html">Admin</a>
					</div>
					<div class="admin-media">
						<a href="admin-profile.html"><img src="assets/images/bart.jpg" class="img-fluid" /></a>
					</div>
					<div class="admin-support">
						<a href="support.html"><button class="support-btn" name="admin_support">Support <i class="fa-sharp fa-solid fa-arrow-right"></i></button></a>
					</div>
				</div> 
			</header>
			
			<div class="admin-dashboard-panel">
				<div class="user-filter-panel">
					<div class="row">
						<div class="col-lg-8 col-md-8 col-12">
							<div class="filter-form">
								<form>
									<div class="form-group">
										<div class="user-types">
											<select>
												<option>All User Types</option>
											</select>
											<img src="assets/images/chevron-down.png" class="img-fluid" />
										</div>
									</div>
									<div class="form-group">
										<div class="user-types">
											<select>
												<option>Newest First</option>
											</select>
											<img src="assets/images/chevron-down.png" class="img-fluid" />
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<div class="search-form">
								<form>
									<div class="form-group">
										<div class="user-types">
											<input type="search" name="search_input" placeholder="" />
											<img src="assets/images/icon-search.png" class="img-fluid" />
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="user-listing-panel">
					<ul class="nav-panel">
						<li class="nav-panel-item">
							<div class="user-media">
								<div class="profile-picture blue-border">
									<img src="assets/images/marinabell.png" class="img-fluid" />
								</div>
								<div class="user-info">
									<h5>Marina Bell</h5>
									<p>@MarinaBell</p>
									<a href="#">Admin</a>
								</div>
							</div>
							<div class="user-action">
								<a href="#" class="border-btn"><span>Downgrade</span></a>
								<a href="#"><img src="assets/images/delete-icon.svg" class="img-fluid" /></a>
								<a href="{{ route('user', ['id' => 1]) }}" class="user-new-btn">Edit</a>
							</div>
						</li>
						<li class="nav-panel-item">
							<div class="user-media">
								<div class="profile-picture purple-border">
									<img src="assets/images/emmawatson.png" class="img-fluid" />
								</div>
								<div class="user-info">
									<h5>Emma Watson</h5>
									<p>@EmmaWatson</p>
									<a href="#">Editor</a>
								</div>
							</div>
							<div class="user-action">
								<a href="#" class="border-btn"><span>Upgrade</span></a>
								<a href="#"><img src="assets/images/delete-icon.svg" class="img-fluid" /></a>
								<a href="edit-users.html" class="user-new-btn">Edit</a>
							</div>
						</li>
						<li class="nav-panel-item">
							<div class="user-media">
								<div class="profile-picture orange-border">
									<img src="assets/images/marinabell.png" class="img-fluid" />
								</div>
								<div class="user-info">
									<h5>Emma Watson</h5>
									<p>@EmmaWatson</p>
									<a href="#">Editor</a>
								</div>
							</div>
							<div class="user-action">
								<a href="#"><img src="assets/images/delete-icon.svg" class="img-fluid" /></a>
								<a href="edit-users.html" class="user-new-btn">Edit</a>
							</div>
						</li>
						<li class="nav-panel-item">
							<div class="user-media">
								<div class="profile-picture">
									<img src="assets/images/marinabell.png" class="img-fluid" />
								</div>
								<div class="user-info">
									<h5>Emma Watson</h5>
									<p>@EmmaWatson</p>
									<a href="#">Editor</a>
								</div>
							</div>
							<div class="user-action">
								<a href="#"><img src="assets/images/delete-icon.svg" class="img-fluid" /></a>
								<a href="edit-users.html" class="user-new-btn">Edit</a>
							</div>
						</li>
						<li class="nav-panel-item">
							<div class="user-media">
								<div class="profile-picture">
									<img src="assets/images/marinabell.png" class="img-fluid" />
								</div>
								<div class="user-info">
									<h5>Emma Watson</h5>
									<p>@EmmaWatson</p>
									<a href="#">Editor</a>
								</div>
							</div>
							<div class="user-action">
								<a href="#"><img src="assets/images/delete-icon.svg" class="img-fluid" /></a>
								<a href="edit-users.html" class="user-new-btn">Edit</a>
							</div>
						</li>
						<li class="nav-panel-item">
							<div class="user-media">
								<div class="profile-picture brown-border">
									<img src="assets/images/marinabell.png" class="img-fluid" />
								</div>
								<div class="user-info">
									<h5>Emma Watson</h5>
									<p>@EmmaWatson</p>
									<a href="#">Editor</a>
								</div>
							</div>
							<div class="user-action">
								<a href="#"><img src="assets/images/delete-icon.svg" class="img-fluid" /></a>
								<a href="edit-users.html" class="user-new-btn">Edit</a>
							</div>
						</li>
					</ul>

					<div class="pagination">
						<ul>
							<li><a href="#">Previous</a></li>
							<li><a href="#" class="active">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">6</a></li>
							<li><a href="#">7</a></li>
							<li><a href="#">8</a></li>
							<li><a href="#">9</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>

				</div>
			</div>                  
		</div>

	</div>

<!----YOUR-CODE-HERE----->
@endsection