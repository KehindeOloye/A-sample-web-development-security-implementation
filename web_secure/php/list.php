<?php

	session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);?>

<html>
  <head>
    <title>Query Output</title>
	<style>
	table, th, td {
     border: 1px solid black;
	}
	</style>
  </head>
  <body>
<?php


  	if (!isset ($_SESSION["username"])) {

		header( 'Location: login.html' ) ;
		return;
	}
	else {
		$username = $_SESSION["username"];
	}
	if (isset ($_POST["nameofList"]))
		{
			$nameofList = $_POST["nameofList"];
		}

		$host = "csdm-mysql";
	    $user = "1417829";
	    $pass = "1417829";
   	    $database = "db1417829_exam";

    $connection  = mysqli_connect($host, $user, $pass, $database)
      or die ("Error is " . $mysqli_error ($connection));

	$nameofList= $connection->real_escape_string ($nameofList);
	
	$query = "SELECT * from ListEntry WHERE Username='$username' AND ListName='$nameofList' ";

	$ret = $connection->query ($query);

 
	$num_results = mysqli_num_rows ($ret);

  
	if ($num_results == 0) {
    echo "Oh no!";
    exit;
	}
  
    echo "<table>";
    echo "<tr>";
    echo "<th>ListName</th>";
    echo "<th>Item</th>";
    echo "<th>NumToBuy</th>";
    echo "<th>BudgetPerUnit</th>";

    echo "</tr>";

	// for each record we got out of our query...
	for ($i = 0; $i < $num_results; $i++) {
    echo "<tr>";
	// Get the next row from the recordset.
    $row = mysqli_fetch_array ($ret);

    echo "<td>" . $row["ListName"] . "</td>";
    echo "<td>" . $row["Item"] . "</td>";
    echo "<td>" . $row["NumToBuy"] . "</td>";
    echo "<td>" . $row["BudgetPerUnit"] . "</td>";

    echo "</tr>";
	}

	echo "</table>";

	// Close our mysql connection
	mysqli_close($connection);

?>

<a href = "account.php">Back to Account Page</a>
</body>
</html>