<!DOCTYPE html>
<html>

<head>
	<title>SQL Injection</title>
	<link rel="shortcut icon" href="../Resources/hmbct.png" />
	<link rel="stylesheet" href="../Resources/button.css">
</head>

<body>

	<!-- <div>
		<button type="button" name="homeButton" onclick="location.href='../homepage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Home Page</button>
		<button type="button" name="mainButton" onclick="location.href='sqlmainpage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Main Page</button>
	</div> -->

	<div align="center">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<h1> Prepare Statement Demonstration: </h1>
			<h3>Enter your first name to get details: </h3>
			First name :   <input type="text" name="firstname" value="Pratham">
			 <button type="submit" name="submit" value="Submit" class="button"  style="margin-top: 30px;margin-bottom: 30px">Submit</button>
		</form>
	</div>


	<?php
	$servername = 'localhost:8889';
	$username = "root";
	$password = "root";
	$db = "1ccb8097d0e9ce9f154608be60224c7c";

	//' or 1=1--  && John' or '1'='1

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);

	if (isset($_POST["submit"])) {
		$firstname = $_POST["firstname"];

        //Solution
		// $stmt = $conn->prepare("SELECT firstname,lastname,number FROM users WHERE firstname=?");
        // $stmt->bind_param("s", $firstname);
        // $stmt->execute();
        // $result = $stmt->get_result();
        
		//Attack	
       $sql = "SELECT firstname,lastname,number,username,password FROM users WHERE firstname='$firstname'"; //String
		$result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row["firstname"];
				echo " ";
				echo $row["lastname"];
				echo " "; 
				echo $row["number"];
				echo " ";
				echo $row['username'];                    
				echo " ";
				echo $row['password'];  
                echo "<br>";
            }
        } else {
            echo "0 results";
        }
	}
?>
</body>
</html>