<?php
// include "db.config.inc.php";

//connect to MySQL Server
// $db = mysqli_connect($host, $user, $pass, $dbase);
$db = mysqli_connect("localhost", "root", "", "people");

//check the connection
if( mysqli_connect_errno($db) ){
	echo "Error connecting to DB Server";
}

//prepare the SQL query
$sql = "SELECT * FROM persons";

//run the query
$result = mysqli_query($db, $sql);

if( $myrow = mysqli_fetch_array($result) ){
	echo '<table border="1">';
	echo "	<tr>
				<td>Name</td>
				<td>Email</td>
			</tr>";
	do{
		echo "<tr>";
		echo "<td>".$myrow['name']."</td>";
		echo "<td>".$myrow['email']."</td>";
		echo "</tr>";
	}while($myrow = mysqli_fetch_array($result));
	echo '</table>';
}

//process the results
echo "<br /><b>Total Records: " . mysqli_num_rows($result)."</b>";
?>