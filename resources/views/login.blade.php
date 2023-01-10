<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Keno Admin | login </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="{{ asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('public/assets/css/nav-style.css')}}" rel="stylesheet">
	<link href="{{ asset('public/assets/css/responsive.css')}}" rel="stylesheet">
	<!-- Font awesome  CSS -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>

input:-internal-autofill-selected {
    appearance: menulist-button;
    background-color: transparent !important;
    background-image: none !important;
    color: -internal-light-dark(black, white) !important;
}

.form-check-input:checked {
    background-color: #23baf0;
    border-color: #23baf0;
}
  input:not[type="submit"] {
        background-color: #ffffff;
        border: 1px solid #cccccc;
        padding: 5px;
      }
      input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0 1000px white inset !important;
      }
      .hidden {
        display: none;
      }


      @media only screen and (min-width: 599px)  {

      }

	.hide{
		display: none;
	}

</style>


</head>

<body class="h-100">
    
	<section class="login-section-main verticle-middle">
	  <div class="container">
	    <div class="row">
		@if (\Session::has('login-error'))
			<div class="alert alert-danger">
				<ul>
					<li>{!! \Session::get('login-error') !!}</li>
				</ul>
			</div>
		@endif
		@if (\Session::has('message'))
			<div class="alert alert-success">
				<ul>
					<li>{!! \Session::get('message') !!}</li>
				</ul>
			</div>
		@endif
		  <div class="col-lg-6 col-md-12 m-auto">
		    <div class="logo-box">
			  <!-- <img src="assets/image/logo.png" alt=""> -->
			  <img class="logo-image" src="http://admindev.keno.ae/public/assets/image/login-logo.png" alt="">
			</div>
			<div class="customerLogin">
			<div class="login-form">
				<div class="main_box_shadow"></div>
			
				<!-- <h1> Sign in your account </h1> -->
				<h1> Login </h1>
				 <form class="Homefrom" method="POST" action="{{ route('signin') }}" autocomplete="off">
					  {{ csrf_field() }}
					  <div class="mb-4 floating-label-content login_email">
						<label for="exampleInputEmail1" class="form-label floating-label">Email</label>
						<input onkeyup="loginvalidation()" onblur="loginvalidation()" type="email" name="email" class="form-control floating-input" id="email_id" required value="{{ old('email') }}" aria-describedby="emailHelp" autocomplete="off" >
						<img id="email-check" class="toggle-password hide" src="http://admindev.keno.ae/public/assets/image/email-check.png" alt="">
						
					  </div>
					  <div class="mb-4 floating-label-content login_password">
						<label for="exampleInputPassword1" class="form-label floating-label">Password</label>
						<input onkeyup="loginvalidation()" onblur="loginvalidation()" type="password" name="password" class="form-control floating-input" id="password" required   autocomplete="off">
						<!-- <i class="toggle-password fa fa-fw fa-eye-slash"></i> -->
						 <img id="open_eye" onclick="showPassword()" class="toggle-password hide" src="http://admindev.keno.ae/public/assets/image/password-eye.png" alt="">
						 <img class="toggle-password" onclick="showPassword()" id="close_eye" src="http://admindev.keno.ae/public/assets/image/eye_off.png" alt="">								
					  </div>					  	
					  <button type="submit" id="main_login_btn" disabled class="custom-btn main_login_btn">LOG IN</button>
				 </form>
			</div>
			</div>
		  </div>
		</div>
	  </div>
	</section>
	
	
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
<script>
	function loginvalidation(){
		var email=document.getElementById("email_id").value;
        var password=document.getElementById("password").value;
		document.getElementById("main_login_btn").disabled = true;
		document.getElementById("email-check").classList.add("hide");
		document.getElementById('email_id').style.fontWeight='';
		
		var emailtrue=0;
		if(email){
			var value1 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  				if(email.match(value1)){
					document.getElementById("email-check").classList.remove("hide");
					emailtrue=1;
  				} 
		}
		document.getElementById('main_login_btn').style.backgroundColor='#00000043';
		if(password && emailtrue){
			 
				document.getElementById('main_login_btn').style.backgroundColor='black';
				document.getElementById('email_id').style.fontWeight='bold';
				document.getElementById("main_login_btn").disabled = false;
		} 
	} 
	function showPassword(){
		var x = document.getElementById("password");
		
  			if (x.type === "password") {
    			x.type = "text";
				document.getElementById("close_eye").classList.add("hide");
				document.getElementById("open_eye").classList.remove("hide");
  			} else {
    			x.type = "password";
				document.getElementById("open_eye").classList.add("hide");
				document.getElementById("close_eye").classList.remove("hide");
  			}
		
	}
</script>

</body>
</html>

