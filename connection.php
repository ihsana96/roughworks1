<?php
$servername = "localhost";
$username = "dayscholars";
$password = "password";
$dbname="mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
/** 
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{echo "Connected successfully";
  $sql = "INSERT INTO tbldemo (name, status, date)
  VALUES ('John', 1, CURRENT_DATE)";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}*/




?>
