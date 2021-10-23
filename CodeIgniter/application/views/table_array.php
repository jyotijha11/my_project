<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Table</title>
</head>
<body>
<div id="container">
	<h1>Table</h1>
	<div id="body">
		<table width="100" border="1" cellpadding="10">
			<thead>
				<th>S.No.</th>
				<th>Name</th>
				<th>Address</th>
				<th>Email</th>
			</thead>
			<tbody>
				<?php
				$slno=1;
				foreach($tablearr as $value){
				?>
				<tr>
					<td><?php echo $slno;?></td>
					<td><?php echo $value['name']?></td>
					<td><?php echo $value['address']?></td>
					<td><?php echo $value['email']?></td>
				</tr>
				<?php $slno++;}?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>