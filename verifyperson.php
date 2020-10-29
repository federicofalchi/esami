<?php

//Block 1
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

//Block 2
    $user= $_POST['username'];
    $pass= md5(sha1($_POST['password']));
    $name= $_POST['name'];

//Block 3
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


//Block 4
    $sql= "SELECT username FROM login WHERE username= '$user'"; 
    $result = mysqli_query($conn,$sql);

    $row = mysqli_num_rows($result); 

    if(!$row){
        $sqlins = "INSERT INTO login (username, password, nome)
        VALUES ('$user', '$pass', '$name')";
        
        if ($conn->query($sqlins) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sqlins . "<br>" . $conn->error;
        }
    } else {
        echo "<br> L'elemento è presente, procediamo alla verifica della password <br>";

      //  $sqlpwd= "SELECT username FROM login WHERE username= '$user' AND password='$pass";
      //  $resultpwd = mysqli_query($conn,$sqlpwd);

      //  $rowpwd = mysqli_num_rows($resultpwd); 

    $sqlp= "SELECT username FROM login WHERE username= '$user' AND password ='$pass'"; 
    $resultp = mysqli_query($conn,$sqlp);

    $rowp = mysqli_num_rows($resultp); 

        if (!$rowp) {
            echo "La password è errata";
          } else {
              echo "La password è corretta. Benvenuto";
          }
        
        


    }


    $conn->close();

?>
