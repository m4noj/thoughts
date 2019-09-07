<h2><i class="fa fa-fw fa-comment"></i> All Thoughts (<?=$total_thoughts; ?>)</h2>
<br>
<?php foreach($thoughts as $thought){ ?>
<div class='thought-box card'>
	<!--	<div class='thought_title'>Title</div>-->
	<div class="thought_body">
		<form action="/thoughts/thought/delete" method="post">
			<input type="hidden" name="id" value="<?=$thought['id'];?>">
			<?php if($loggedIn): ?>
			<?php if($authID== $thought['authorid']): ?>
			<a href="/thoughts/thought/edit?id=<?=$thought['id']?>" class='mr-2 mb-3 btn btn-sm btn-success' style="border-radius:50%;position:absolute;top:5px;right:40px;" title="edit"><i class="fa fa-fw fa-pencil"> </i></a>
			<button type="submit" class='mb-3 btn btn-sm btn-danger' title="delete" style="border-radius:50%;position:absolute;top:5px;right:10px;"><i class="fa fa-fw fa-close"> </i></button>
			<?php endif; ?>
			<?php endif; ?>
		</form>
		<span><?=$thought['text'] ?></span>
	</div>
	<div class="thought_info">
		<div class='thought_author'>
			<p><span class='teal'><i class="fa fa-fw fa-user"> </i>by </span><span><a href="#" class='text-white'> <?=$thought['name'] ?></a></span></p>
		</div>
		<div class="thought_date">
			<p><span class='teal'><i class="fa fa-fw fa-clock-o"> </i>on </span><span><?php $date = new DateTime($thought['date']);echo $date->format('j M Y'); ?></span></p>
		</div>
		<div class="thought_likes">
			<p><span class='teal'><i class="fa fa-fw fa-envelope"> </i>email </span><span><a href="mailto:<?=$thought['email'] ?>" class='text-white'><?=$thought['email'] ?></a></span></p>
		</div>
	</div>
</div><br>
<?php } ?>