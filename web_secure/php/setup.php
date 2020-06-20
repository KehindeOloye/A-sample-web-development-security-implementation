<html>
  <head>
    <title>Database Examples</title>
  </head>

  <body>
    <?php
  	ini_set('display_errors', 1);
	  error_reporting(~0);

    $host = "csdm-mysql";
    $user = "1417829";
	$pass = "1417829";
    $database = "db1417829_exam";
    $connection  = mysqli_connect($host, $user, $pass, $database)
      or die ("Error is " . $mysqli_error ($connection));

    $query = "DROP TABLE User";

    $ret = $connection->query ($query);

    $query = "CREATE TABLE User ( Username varchar (255), Password varchar (255), Email varchar (255), Salt varchar (255))";

    $ret = $connection->query ($query);
     if ($ret) {
      echo "<p>user Table created!</p>";
    }
    else {
      echo "<p>Something went wrong: " . mysqli_error($connection); + "</p>";
    }

    $query = "DROP TABLE ListEntry";

	$ret = $connection->query ($query);

	$query = "CREATE TABLE ListEntry ( Username varchar (255), ListName varchar (255),Item varchar (255), NumToBuy int, BudgetPerUnit int)";

    $ret = $connection->query ($query);

    echo $connection->error;
      if ($ret) {
      echo "<p>ListEntry Table created!</p>";
    }
    else {
      echo "<p>Something went wrong: " . mysqli_error($connection); + "</p>";
    }

    ?>
  </body>
</html>