<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);
?>

<html>
  <head>
    <title>Simple Login</title>
  </head>
  <body>

  <?php

  /*if (isset ($_SESSION["username"])) {

  		echo "<p>You are already logged in.</p>";
		return ;
	}*/

    $username = $_POST["username"];
    $passwd= $_POST["password"];

    $host = "csdm-mysql";
    $user = "1417829";
    $pass = "1417829";
    $database = "db1417829_exam";
    $connection  = mysqli_connect($host, $user, $pass, $database)
      or die ("Error is " . $mysqli_error ($connect));


    $username = $connection->real_escape_string ($username);
    $passwd = $connection->real_escape_string ($passwd);

    $query = "select * from User where Username=\"$username\"";

	  $ret = $connection->query ($query);

    $num_results = mysqli_num_rows ($ret);

    if ($num_results > 0) {
      $row = mysqli_fetch_array($ret);

      $salt = $row["Salt"];

      $passwd = sha1( ($salt). $passwd);


      if ($passwd == $row["Password"]) {
	  
           $_SESSION["username"] = htmlentities($username);

		            echo "<p>Login successful, ". $_SESSION["username"] . ".  Click <a href = \"account.php\">here</a> to go to your List page.</p>";
		        }
		  	  else {

		          echo "<p>Invalid login</p>";
		          echo "<a href = \"login.html\">Try again</a>";
		  	  }
		  	}
		      else {
		  	  	echo "<p>Invalid login</p>";
		        echo "<a href = \"registration.html\">Register</a>";
    }


  ?>

  </body>
</html>
