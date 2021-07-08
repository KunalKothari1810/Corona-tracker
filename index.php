<!DOCTYPE html>
<html>
<head>
  <title>Covid-19 Cases</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body>
<div class="card-body table-responsive">
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>State/UT</th>
			<th>Confirmed</th>
			<th>Active</th>
			<th>Recovered</th>
			<th>Deaths</th>
		</tr>
	</thead>
	<?php
		$data=file_get_contents('https://api.covid19india.org/data.json');
		$coronalive=json_decode($data,true);
		$statecount=count($coronalive['statewise']);
		$i=1;
		
		while($i < $statecount){
			$dayconfirmed=$coronalive['statewise'][$i]['deltaconfirmed'];
			$dailyrecovered=$coronalive['statewise'][$i]['deltarecovered'];
			$dailydeaths=$coronalive['statewise'][$i]['deltadeaths'];
			$state=$coronalive['statewise'][$i]['state'];
	?>
		<tr>
			<td><?php echo $state ?></td>
			<td><?php echo $coronalive['statewise'][$i]['confirmed'] ?></td>
			<td><?php echo $coronalive['statewise'][$i]['active'] ?></td>
			<td><?php echo $coronalive['statewise'][$i]['recovered'] ?></td>
			<td><?php echo $coronalive['statewise'][$i]['deaths'] ?></td>
		</tr>
	<?php
		$i++;
		}
	?>
</html>
</table>
</div>
</body>
</html>