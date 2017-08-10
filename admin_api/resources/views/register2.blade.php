<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sba</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
	
	<div class="row">
		<div class="col-sm-12">
		@if(Session::has('success'))
			<div class="alert alert-success alert-dismissible">
				<h4><i class="icon fa fa-check"></i> {{ Session::get('success') }}</h4>
			</div>	
		@endif
		@if(Session::has('error'))
			<div class="alert alert-info alert-dismissible">
				<h4><i class="icon fa fa-info"></i> {{ Session::get('error') }}</h4>
			</div>	
		@endif	
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="grey-wrapper">
				<h2> CREATE AN ACCOUNT</h2>
				<div class="form-wrapper">
					<p>Please enter your details to create an account.</p>
					{{ Form::open(['url' => route('Register')]) }}
						  <div class="form-group @if ($errors->has('username')) {{'has-error'}} @endif">
							<input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="User Name">
							@if ($errors->has('username'))<label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i> {{ $errors->first('username') }}</label>
							@endif
						  </div>
						   <div class="form-group @if ($errors->has('phone')) {{'has-error'}} @endif">
							<input type="text" name="phone" class="form-control" value="{{ old('phone') }}"  placeholder="Phone Number">
							@if ($errors->has('phone'))<label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i> {{ $errors->first('phone') }}</label>
							@endif
						  </div>
						  <div class="form-group @if ($errors->has('email')) {{'has-error'}} @endif">
							<input type="email" name="email" class="form-control" value="{{ old('email') }}"  placeholder="E-mail">
							@if ($errors->has('email'))<label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</label>
							@endif
						  </div>
						  <div class="form-group @if ($errors->has('password')) {{'has-error'}} @endif">
							<input type="password" name="password" class="form-control" placeholder="Password" >
							@if ($errors->has('password'))<label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</label>
							@endif
						  </div>
						  <div class="form-group @if ($errors->has('confirm_password')) {{'has-error'}} @endif">
							<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
							@if ($errors->has('confirm_password'))<label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i> {{ $errors->first('confirm_password') }}</label>
							@endif
						  </div>

						  
						  <div class="form-buttons">
						  <input type="hidden" name="user_type" value="free">
							 <button type="submit" class="btn btn-rounded btn-orange"><i class="fa create-account-icon"></i>Create an Account
							 </button>

						  </div>
						{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
    </body>
</html>
