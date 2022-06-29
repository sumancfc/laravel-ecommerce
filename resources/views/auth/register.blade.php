<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="Suman Shrestha">
	<meta name="keywords" content="bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Login | Suman Shrestha</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <!-- Layout styles -->  
  <link rel="stylesheet" href="{{ asset("backend/css/style.css") }}">
  <!-- End layout styles -->

  {{-- <link rel="shortcut icon" href="{{ asset("backend/assets/images/favicon.png") }}" /> --}}
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="auth-side-wrapper">
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                    <div class="auth-form-wrapper px-4 py-5">
                      <a href="#" class="noble-ui-logo logo-light d-block mb-2">Sign<span>UP</span></a>
                      <h5 class="text-muted fw-normal mb-4">Create a free account.</h5>
                      <form class="forms-sample" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Full Name</label>
                          <input type="text" class="form-control" id="name" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="email" name="email" :value="old('email')" required placeholder="Email">
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
                          </div>
                        <div>
                          <button type="submit" class="btn btn-primary text-white me-2 mb-2 mb-md-0">Sign up</button>
                        </div>
                        <a href="{{ route("login") }}" class="d-block mt-3 text-muted">Already a user? Sign in</a>
                      </form>
                    </div>
                </div>
            </div>
		</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</body>
</html>