<h1 class="text-center"><i class="fa fa-fw fa-users"></i> All Authors</h1>
<br>
<table class='table table-hover table-success text-center'>
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Join Date</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($authors as $k => $v){
	echo"<tr>
		<td>".$v['id']."</td>
		<td><a href='/thoughts/authors/id/".$v['id']."'>".$v['name']."</a></td>
		<td>".$v['email']."</td>
		<td>".$v['date']."</td>
		</tr>";
	}
?>
	</tbody>
</table>