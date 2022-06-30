

<!DOCTYPE html>
 <html>
<head>
  <title>Read a JSON File</title>

      </head>
	  <body>

<?php
	
	// $f = fopen("data.json", 'r');

	// $s = fread($f, filesize("data.json"));

	// $data = json_decode($s);
	// var_dump($s);

	// // echo "<hr><hr>";
	// // var_dump($data);

	// echo "<hr><hr>";

	// echo $data->firstname . ' ' . $data->lastname;

	// // echo "<table border=1>";
	// // echo "<tr>";
	// // echo "<th>Firstname</th>";
	// // echo "<th>LastName</th>";
	// // echo "</tr>";
	
	// // echo "<tr>";
	// // echo "<td>" . $data->firstname . "</td>";
	// // echo "<td>" . $data->lastname . "</td>";
	// // echo "</tr>";
	// // echo "</table>";
	

	// fclose($f);

	if(file_exists('data.json'))
{
	$filename = 'data.json';
	$data = file_get_contents($filename); //data read from json file
	// print_r($data);
	$users = json_decode($data);  //decode a data

	// print_r($users); //array format data printing
	 $message = "<h3>JSON file data</h3>";
}else{
	 $message = "<h3>JSON file Not found</h3>";
}
?>

	   <div>
	   <div>
	   <?php
			 if(isset($message))
			 {
				  echo $message;

			 ?>
		<table border=1>
			<tbody>
				<tr>
					<th>FirstName</th>
					<th>LastName</th>
					<th>Gender</th>
					<th>Email</th>
					<th>Mobile No</th>
					<th>Address</th>
					<th>Country</th>
				</tr>
				<?php foreach ($users as $user) { ?>
				<tr>
					<td> <?= $user->firstname; ?> </td>
					<td> <?= $user->lastname; ?> </td>
					<td> <?= $user->gender; ?> </td>
					<td> <?= $user->email; ?> </td>
					<td> <?= $user->mobileno; ?> </td>
					<td> <?= $user->address1; ?> </td>
					<td> <?= $user->country; ?> </td>
				</tr>
				<?php }
			 }
			 else
				echo $message;
			 ?>
    </tbody>
</table>
</div>
</div>
</body>
</html>