<!DOCTYPE html>
<html>
    @extends('layouts.master')
    @section('title', 'Welcome Homepage')
    @section('content')
      <div class="wrapper fadeInDown">
				<div id="formContent">

					<div class="fadeIn first">
            <br>
            <h1>Login</h1> 
						<span class="glyphicon glyphicon-user" id="icon" alt="User Icon"></span>
					</div>

					<form>
						<input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
						<input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
						<input type="submit" class="fadeIn fourth" value="Log In">
					</form>

					<div id="formFooter">
						<a class="underlineHover" href="#">Forgot Password?</a>
					</div>

				</div>
			</div>
    @stop
</html>





