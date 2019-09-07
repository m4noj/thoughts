<h1 class='text-center'><i class="fa fa-fw fa-user"> </i>Register</h1>
<br>
<div class="container col-md-5">
	<form action="" method="post">
		<div class="form-group">
			<input type="text" name="author" class='form-control' placeholder="Your Name"<?php if(!empty($data['name'])){ echo "value='".$data['name']."'";} ?>>
			<?php if(!empty($errors['name'])){ echo "<p class='text-danger small ml-2 mt-2'>".$errors['name']."</p>"; } ?>
		</div>
		<div class="form-group">
			<input type="text" name="email" class='form-control' placeholder="Email" <?php if(!empty($data['email'])){ echo "value='".$data['email']."'";} ?>>
			<?php if(!empty($errors['email'])){ echo "<p class='text-danger small ml-2 mt-2'>".$errors['email']."</p>"; } ?>
		</div>
		<div class="form-group">
			<input type="password" name="pass" class='form-control' placeholder="password" <?php if(!empty($data['pass'])){ echo "value='".$data['pass']."'";} ?>>
			<?php if(!empty($errors['pass'])){ echo "<p class='text-danger small ml-2 mt-2'>".$errors['pass']."</p>"; } ?>
		</div>
		<div class="text-center">
			<input type="submit" value="Sign Up" name='submit' class='btn btn-success'>
		</div>
	</form>
</div>