<?php if($authorid == $thought['authorid']): ?>
<?php if(!isset($_POST['submit'])){ ?>

<h3 class='ml-3'><?php echo $title; ?></h3>
<div class="col-md-5">
<form action="" method="post">
<input type="hidden" name="author" value='<?=$thought['authorid']; ?>'>
<input type="hidden" name="id" value='<?=$thought['id']; ?>'>
<textarea id="thoughttext" name="text" rows="3" cols="30" class='form-control'><?=$thought['text']; ?>
</textarea>
<br>
<input type="submit" name="submit" value="Update" class='btn btn-primary'>
	</form>
</div>
<?php } ?>
<?php else: ?>


<p class='text-center'>You may only edit thoughts that you've posted</p>
<?php endif; ?>