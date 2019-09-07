<h1 class="text-center"><i class="fa fa-fw fa-lock"></i> Login to Thoughts</h1>
<br>
<form action="" method="post" class='col-md-5 mx-auto'>
<p class='text-center'><?php if($msg){echo $msg;} ?></p>	
	<div class="form-group">
		<input type="text" name="email" placeholder='Email' class="form-control">
	</div>
	<div class="form-group">
	<input type="password" name="password" placeholder='password' class="form-control">
	</div>
	<div class="form-group text-center">
		<input type="submit" value="Log In" class="btn btn-success">
	</div>
</form>
<br><br>
<p class='text-center'>dont have an account yet? <a href="/thoughts/register">create account.</a></p>