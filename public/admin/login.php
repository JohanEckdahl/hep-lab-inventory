<?php

require_once('../../includes/initialize.php');



if (isset($_POST['submit'])) {

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	
	// Check database
	$found_user = User::authenticate($username, $password);

	if ($found_user) {
		$session->login($found_user);
		redirect_to("../inventory/table.php");
	}else{
		$message="Username/password combination incorrect.";
	}

}else{
	$username = "";
	$password = "";
}

?>


<html>
  <head>
    <title>UCSB HGC Login</title>
  </head>
  <body>
    <div id="header">
      <h1>UCSB High Energy Physics</h1>
    </div>
    <div id="main">
		<h2>Admin Login</h2>
		
		<form action="login.php" method="post">
		  <table>
		    <tr>
		      <td>Username:</td>
		      <td>
		        <input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Password:</td>
		      <td>
		        <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Login" />
		      </td>
		    </tr>
		  </table>
		</form>
    </div>

  </body>
</html>


<?php if(isset($database)) { $database->close_connection(); }


?>

