<!DOCTYPE html>
 <html>
<head>
  <title>Read a JSON File</title>

      </head>
	  <body>

<?php


	if(file_exists('data.json'))
{
	$filename = 'data.json';
	$data = file_get_contents($filename); //data read from json file
	//print_r($data);
	$users = json_decode($data);  //decode a data

	//print_r($users); //array format data printing
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
                    <th>UserName</th>
					<th>Gender</th>
					<th>Email</th>
                    <th>Password</th>
					<th>Mobile No</th>
					<th>Address</th>
					<th>Country</th>
				</tr>
				<?php foreach ($users as $user) { ?>
				<tr>
					<td> <?= $user->firstname; ?> </td>
					<td> <?= $user->lastname; ?> </td>
                    <td> <?= $user->username; ?> </td>
					<td> <?= $user->gender; ?> </td>
					<td> <?= $user->email; ?> </td>
                    <td> <?= $user->password; ?> </td>
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