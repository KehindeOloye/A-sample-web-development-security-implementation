<html>
  <head>
    <title>Add</title>
  </head>
  <body>
<?php
	session_start();
	if (!isset ($_SESSION["username"]))
		{
			header( 'Location: login.html' ) ;
			return;
		}
		else {
			$username = $_SESSION["username"];
		}

	if (isset ($_POST["listtoadd"]))
		{
			$listtoadd = $_POST["listtoadd"];


		}

	if (isset ($_POST["item"]))
		{
			$item= $_POST["item"];

	}
	if (isset ($_POST["numberofitem"]))
		{
			$numberofitem = $_POST["numberofitem"];


		}

	if (isset ($_POST["budgetperitem"]))
		{
			$budgetperitem= $_POST["budgetperitem"];

	}
    	$host = "csdm-mysql";
        $user = "1417829";
        $pass = "1417829";
   	 	$database = "db1417829_exam";


    $connection  = mysqli_connect($host, $user, $pass, $database)
      or die ("Error is " . $mysqli_error ($connection));


		$listtoadd= $connection->real_escape_string ($listtoadd);
		$item = $connection->real_escape_string ($item);
		$numberofitem= $connection->real_escape_string ($numberofitem);
		$budgetperitem = $connection->real_escape_string ($budgetperitem);

  		$query = "INSERT INTO ListEntry (Username, ListName, Item, NumToBuy, BudgetPerUnit) VALUES ('$username','$listtoadd', '$item','$numberofitem', '$budgetperitem')";

  		$ret = $connection->query ($query) or die (mysqli_error ($connection));

  		if (!$connection->error)
  		{
    		echo "<p>Entry Added successfully</p>";
  		}
  		else
  		{
    		echo "<p>Entry failed to Add</p>";
  		}

?>

<a href = "account.php">Back to Account Page</a>
</body>
</html>