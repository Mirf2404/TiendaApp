@extends('login.base')
@section('title', 'Argo Create Game')
@section('contenido')
    <h2>Login</h2>
    
     <form action="{{ url('login') }}" method="post">
         @csrf
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header text-center">
	<h4 class="modal-title w-100 font-weight-medium text-left">Sign in</h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">×</span>
	</button>
  </div>
  <div class="modal-body mx-3">
	<div class="md-form mb-4">
	 
            <label for="User" class="form-label">Usuario</label>
            <input type="text" class="form-control validate" id="User" name="User" maxlength="255"  required value="{{ old('User') }}">
        
	</div>
	<div class="md-form mb-4">
	
	 <label for="Password" class="form-label">Contraseña</label>
            <input type="text" class="form-control validate" id="Password" name="Password" maxlength="255"  required value="{{ old('Password') }}">

	</div>
	<div class="checkbox-link d-flex justify-content-between">
	<div class="left-col">
		<input type="checkbox" id="remember_me"><label for="remember_me">Remember Me</label>
	</div>
	<div class="right-col"><a href="#">Forget Password?</a></div>
</div>
  </div>
  
  <div class="modal-footer d-flex justify-content-center">

	<button type="submit" class="btn btn-primary">Sign in</button>
	<a href="{{ url('shop/') }}" class="btn btn-primary">Shop</a>
  </div>
  </form>
   @if(session('verificado'))
       <form action="{{ url('logout') }}" method="post">
            @csrf
            <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-danger mt-3">Logout</button>
            <a href="{{ url('admin/') }}" class="btn btn-success mt-3">Admin</a>
            </div>
            
        </form>
    	


  
      @endif
</div>
</div>



@endsection
