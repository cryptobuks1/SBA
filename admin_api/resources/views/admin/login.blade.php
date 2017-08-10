<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>SBA Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{asset('css/admin/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('css/admin/bootstrap-responsive.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/admin/matrix-login.css')}}" />
        <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">    
		        
            <form id="loginform" method="POST" class="form-vertical" action="{{url(route('login_admin'))}}">
			@if(Session::has('error'))<div class="form-group has-feedback @if ($errors->has('email')) {{'has-error'}} @endif"><label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i> {{ Session::get('error') }}</label></div>@endif
				<div class="control-group normal_text"> <h3>SMART BUILD ASIA</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input name="email" type="text" placeholder="Email" />
							{!! csrf_field() !!}
							@if ($errors->has('email'))<label style="color:indianred"for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</label>@endif
							
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
							@if ($errors->has('password'))<label style="color:indianred" for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</label>@endif
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    
                    <span class="pull-right"><button type="submit" class="btn btn-success" /> Login</button></span>
                </div>
            </form>
        </div>
        
        <script src="{{asset('js/admin/jquery.min.js')}}"></script>  
        <script src="{{asset('js/admin/matrix.login.js')}}"></script> 
    </body>

</html>
