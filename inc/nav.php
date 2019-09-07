<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-collapse collapse" id="navbarsExample04" style="">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="/thoughts"><i class="fa fa-fw fa-home"></i> Home </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/thoughts/thought/list"><i class="fa fa-fw fa-comment"></i> Thoughts</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/thoughts/authors/list"><i class="fa fa-fw fa-users"></i> Authors</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#"><i class="fa fa-fw fa-arrow-up"></i> Top Voted</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/thoughts/thought/add"><i class="fa fa-fw fa-pencil"></i> Post a thought</a>
			</li>
			<?php if($loggedIn): ?>
			<li class="nav-item small" style='position:absolute;right:6rem;display:block;'>
				<a class="nav-link active" href="/thoughts/"><i class="fa fa-fw fa-user"></i> <?=$_SESSION['usr'];?></a>
			</li>
			<li class="nav-item" style='position:absolute;right:5px;'>
				<a class="nav-link active" href="/thoughts/logout"><i class="fa fa-fw fa-power-off"></i> Log out</a>
			</li>
			<?php else: ?>
			<li class="nav-item">
				<a class="nav-link" href="/thoughts/register"><i class="fa fa-fw fa-envelope"></i> Register</a>
			</li>
				<li class="nav-item" style='position:absolute;right:5px;'>
				<a class="nav-link" href="/thoughts/login"><i class="fa fa-fw fa-lock"></i> Log In</a>
			</li>
			 <?php endif; ?>
		</ul>

		<!--
    <form class="form-inline" action="/action_page.php">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="search" name="q" id="q">
      <div class="input-group-prepend">
        <span class="input-group-text"><a href="#"><i class="fa fa-fw fa-search"></i></a></span>
      </div>
    </div> 
  </form>
-->



	</div>
</nav>