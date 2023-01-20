<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
      <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
      <link href="https://fonts.cdnfonts.com/css/maison-neue" rel="stylesheet">
      <title>Arabians</title>
      <style>
         .show-single-box{
            display: none
         }
      </style>
   </head>
   <body>
      <section id="login" class="section-dashboard">
         <div class="container h-100">
            <div class="row h-100 align-items-center">
               <div class="col-lg-4 col-md-4 col-12">
                  <div class="login-form d-flex align-items-center">
                     <div class="form-box show-single-box" id="show-single-box1">
                        <div class="img-box">
                           <img src="{{asset('assets/images/BrandBlue-Logo.svg')}}" class="img-fluid" />
                        </div>
                        <div class="form-heading text-center">
                           <h3>Welcome to your Arabians@Home Dashboard</h3>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                           {{session('success')}}
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">
                           {{session('error')}}
                        </div>
                        @endif
                        <form action="{{url('/login')}}" method="post" id="login_form">
                           @csrf
                           <div class="form-group">
                              <input type="text" placeholder="User name / Email*" class="control-group @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}"  />
                              @error('username')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                              <input type="password" placeholder="Password" class="control-group @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" />
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group">
                              <a href="#" class="show-box" target="1">I forgot my password</a>
                           </div>
                           <div class="form-group d-flex">
                              <button type="submit" name="login" class="control-group">
                              Log in <i class="fa-sharp fa-solid fa-arrow-right"></i>
                              </button>
                           </div>
                        </form>
                     </div>
                     <div class="form-box show-single-box" id="show-single-box2">
                        <div class="img-box">
                           <img src="{{asset('assets/images/BrandBlue-Logo.svg')}}" class="img-fluid" />
                        </div>
                        <div class="form-heading text-center">
                           <h3>Recover Password</h3>
                           <p>Please enter your user name or e-mail address. We will send you an e-mail with link to reset your password.</p>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                           {{session('success')}}
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">
                           {{session('error')}}
                        </div>
                        @endif
                        <form action="{{route('forgot.password')}}" method="post">
                           @csrf
                           <div class="form-group">
                              <input type="text" placeholder="User name / Email*" class="control-group @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  />
                              @error('username')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group">
                              <a href="#" class="show-box" target="2">Go Back</a>
                           </div>
                           <div class="form-group d-flex">
                              <button type="submit" name="login" class="control-group">
                              Send reset link <i class="fa-sharp fa-solid fa-arrow-right"></i>
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/js/style.js')}}"></script>
      <script>
         $(document).ready(function() {
            $(".show-single-box").first().show();
            $('.show-box').click(function(e){
               e.preventDefault();
               var target = $(this).attr('target');
               if(target == 1){
                  $('#show-single-box1').hide();
                  $('#show-single-box2').show();
               }
               if(target == 2){
                  $('#show-single-box1').show();
                  $('#show-single-box2').hide();
               }
            });
         })
      </script>
   </body>
</html>