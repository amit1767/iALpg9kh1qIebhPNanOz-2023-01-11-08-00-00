@extends('layouts.layout')
@section('content')

	<section class="alert_msg">
	  <div class="container">
    <div class="row">
			<h1>Message / Alert / Warning</h1>

           <!--  <div class="alert alert-success alert-dismissible fade show">                
                <strong>Success!</strong> Message has been sent.
            </div>

            <div class="alert alert-info alert-dismissible fade show">                                   
                <strong>Info!</strong> You have got 5 new email.
            </div>

            <div class="alert alert-warning alert-dismissible fade show">                                   
                <strong>Info!</strong> You have got 5 new email.
            </div>

            <div class="alert alert-danger alert-dismissible fade show">                                   
                <strong>Info!</strong> You have got 5 new email.
            </div>

            <div class="alert alert-light alert-dismissible fade show">                                   
                <strong>Info!</strong> You have got 5 new email.
            </div>
 -->
            <div class="alert alert-danger alert-dismissible fade show">
                <ul>
                    <li>Info! You have got 5 new email.
                </li>
                </ul>
            </div>

            <div class="alert alert-light alert-dismissible fade show">
                <ul>
                    <li>Info! You have got 5 new email.
                </li>
                </ul>
            </div>
            <div class="alert alert-warning alert-dismissible fade show">
                <ul>
                    <li>Info! You have got 5 new email.
                </li>
                </ul>
            </div>
            <div class="alert alert-info alert-dismissible fade show">
                <ul>
                    <li>Info! You have got 5 new email.
                </li>
                </ul>
            </div>

            <div class="alert alert-success  alert-dismissible fade show">
                <ul>
                    <li>Info! You have got 5 new email.
                </li>
                </ul>
            </div>


             <div class="alert alert-success  alert-dismissible fade show border_success_left">
                <ul>
                    <li class="fw-bold mb-2">Well done</li>
                    <li>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</li>
                    <hr>
                     <li class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</li>
                </ul>
            </div>

            <div class="alert alert-warning  alert-dismissible fade show border_warning_left">
                <ul>
                    <li class="fw-bold mb-2">Well done</li>
                    <li>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</li>
                    <hr>
                     <li class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</li>
                </ul>
            </div>

          <form class="row g-3">
            <div class="col-md-12 d-block">
              <label for="validationServer01" class="form-label">First name</label>
              <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            
           <!--  <div class="col-md-4">
              <label for="validationServerUsername" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend3">@</span>
                <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div> -->
            <div class="col-md-12 ">
              <div id="validationServer03Feedback" class="invalid-feedback">
                Please provide a valid city.
              </div>
              <label for="validationServer03" class="form-label">City</label>
              <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>              
            </div>


            <div class="col-md-12">
              <label for="validationServer04" class="form-label">State</label>
              <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                <option selected disabled value="">Choose...</option>
                <option>...</option>
              </select>
              <div id="validationServer04Feedback" class="invalid-feedback">
                Please select a valid state.
              </div>
            </div>



            <div class="col-md-12">
              <label for="validationServer05" class="form-label">Zip</label>
              <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
              <div id="validationServer05Feedback" class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>             
          </form>




		</div>
	  </div>
	</section>
	
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

@endsection

