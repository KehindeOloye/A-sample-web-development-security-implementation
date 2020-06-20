<html>
  <head>
    <title>Simple Registration</title>
  </head>
  <body>


  <?php
  	if (isset ($_POST["username"])) {
  		$username = $_POST["username"];
  	}

  	if (isset ($_POST["password"])) {
  		$password= $_POST["password"];
  	}
  	if (isset ($_POST["email"])) {
	  		$email= $_POST["email"];
  	}
      $host = "csdm-mysql";
	  $user = "1417829";
	  $pass = "1417829";
      $database = "db1417829_exam";

  	$connection  = mysqli_connect($host, $user, $pass, $database)
        or die ("Error is " . $mysqli_error ($connection));


	  $username = $connection->real_escape_string ($username);
      $password= $connection->real_escape_string ($password);
      $email= $connection->real_escape_string ($email);

  	$query_check = "select * from User where Username=\"$username\"";
  	$results = $connection->query ($query_check);
      if (!$results) {
        echo "<p>" . mysqli_error($connection) . "</p>";
      }

  	$num_results = mysqli_num_rows ($results);

  	if ($num_results != 0) {
        echo "<p>That username already exists</p>";
        echo "<a href = \"login.html\">login</a>";
        exit;
      }

    	$salt = uniqid (mt_rand(), true);
  		$password = sha1($salt . $password);
    	$query = "insert into User (Username, Password, Email,Salt) values (\"$username\"
      , \"$password\", \"$email\",\"$salt\")";

  	$ret = $connection->query ($query);


      if (!$ret) {
  	  echo "<p>Failed registration: " . $connection->error . "</p>";
      }

	  echo "<p>Registration successful</p>";
      echo "<a href = \"login.html\">login</a>";


  ?>

  </body>
</html>
