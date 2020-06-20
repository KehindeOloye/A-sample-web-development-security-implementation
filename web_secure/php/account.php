<?php
		session_start();
		if (!isset ($_SESSION["username"])) {

			header( 'Location: login.html' ) ;
			exit;
		}
?>
<html>
  <head>
    <title>My Account</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css" >
  </head>
  <body>
  <script type = "text/javascript">
      function validateforAdd () {        

        var ele = document.getElementsByName ("listtoadd");
		
        if (ele == null) {
          alert ("List to Add must be filled.");
          return false;
        }

        ele = ele[0].value;

        if (ele == "") {
          alert ("List to Add must be filled.");
          return false;
        }
		ele = document.getElementsByName ("item");

        if (ele == null) {
          alert ("Item Type must be completed.");
          return false;
        }

        ele = ele[0].value;

        if (ele == "") {
          alert ("Item Type must be completed.");
          return false;
        }

        ele = document.getElementsByName ("numberofitem");

        if (ele == null) {
          alert ("Number of Item must be filled.");
          return false;
        }

        ele = ele[0].value;

        if (ele == "") {
          alert ("Number of Item must be filled.");
          return false;
        }
		
		ele = document.getElementsByName ("budgetperitem");

        if (ele == null) {
          alert ("Budget per Item must be filled.");
          return false;
        }

        ele = ele[0].value;

        if (ele == "") {
          alert ("Budget per Item must be filled.");
          return false;
        }

        return true
      }
	  
	  function validateforList () {
        var ele = document.getElementsByName ("nameofList");
		
        if (ele == null) {
          alert ("Name of List must be completed.");
          return false;
        }

        ele = ele[0].value;

        if (ele == "") {
          alert ("Name of List must be completed.");
          return false;
        }
        return true
      }
  </script>
  
  <h1>Penny Planner </h1>
	 
  	 <form action = "list.php" method = "post" onSubmit = "return validateforList() ">
		<table>
     		<tr>
	      			<td>
	      				<p>Get List</p>
	      			</td>
	      			<td>
	      				<input type = "text" name = "nameofList">
	      			</td>
	     	</tr>
			<tr>
	      			<td>
	      				<input type = "submit" value = "SUBMIT">
	     			 </td>
	      			<td>
	      				<input type = "reset" value = "RESET"><br/>
	      			</td>

	      		</tr>
	      		
	     </table>
	</form>	
	<hr />
	 
	 <form action = "add.php" method = "post" onSubmit = "return validateforAdd()">
	    <table> 	 	
				<tr>
					<td>
					     <p>List to Add To:</p>
					</td>
					<td>
					     <input type = "text" name = "listtoadd">
					</td>
	      		</tr>
	      		<tr>
					<td>
						<p>Item Type:</p>
					</td>
					<td>
						<input type = "text" name = "item">
					</td>
	      		</tr>
				<tr>
					<td>
					     <p>Number of Item:</p>
					</td>
					<td>
					     <input type = "text" name = "numberofitem">
					</td>
	      		</tr>
	      		<tr>
					<td>
						<p>Budget per Item</p>
					</td>
					<td>
						<input type = "text" name = "budgetperitem">
					</td>
	      		</tr>
	      		<tr>
	      			<td>
	      				<input type = "submit" value = "SUBMIT">
	     			 </td>
	      			<td>
	      				<input type = "reset" value = "RESET"><br/>
	      			</td>
	      		</tr>
		</table>
	 </form>
		

  </body>
</html>
