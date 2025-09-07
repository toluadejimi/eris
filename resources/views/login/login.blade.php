@php use App\Models\Year; @endphp
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<a href="/"><h2 class="heading-section">ERIS PORTAL</h2>
				</a>
			</div>



			<div class="row justify-content-center">

				<div class="col-md-12 col-lg-10">

					@if ($message != null)
						<div class="text-center alert alert-danger" role="alert">
							<span>{{ $message }}</span>
						</div>
					@endif


					<div class="wrap d-md-flex">







						<div class="img" style="background-image: url(images/bg-1.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">

			      		<div class="w-100">

							@php
								$current_session = Year::where('status', 1)->first();
								$all_session = Year::where('status', 0)->get();

							@endphp
							<span class=" badge text-bg-success">Active Year:- {{$current_session->title}}</span>
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
							
			      	</div>
				<form action="login" method="POST" class="signin-form">
                    @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">STUDENT ID / EMAIL</label>
			      			<input type="text" class="form-control"  name="login"  placeholder="Email or Student ID" required>
			      		</div>

		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control"  name="password"  placeholder="Password" required>
		            </div>


					<div class="form-group mb-3">
						<label class="label" for="password">Select Academic Session</label>
						<select class="form-control" name="session"  required>
							<option value="{{$current_session->session}}">{{$current_session->title}}</option>
							<option value="2022_2023">2022/2023</option>
							<option value="2024_2025">2024/2025</option>
							<option value="2025_2026">2025/2026</option>
							<option value="2026_2027">2026/2027</option>
							<option value="2028_2029">2028/2029</option>
							<option value="2030_2031">2030/2031</option>
							<option value="2032_2033">2032/2033</option>
						</select>
					</div>

		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>
		          </form>
		          <p class="text-center"><a href="public-registration">New Scholar Registration</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

