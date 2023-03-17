<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
session_start();
$email= $_SESSION['email'];

// require_once __DIR__ . '\composer\vendor\autoload.php';

 $con = new mysqli("localhost","root","","guvi_db");
  if($con->connect_error)
  {
      die("Failed to connect : ".$con->connect_error);
  }
  else{
    $sql = "select * from register where email = :email";
    $stmt = $con->prepare($sql);

    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $stmt_result = $stmt->fetch();

    if($stmt_result->num_rows >0)
    {
        $data = $stmt_result->fetch_assoc();
        
        if($data['email'] === $email)
        {
            
          echo '
          <tr><th>'. $data["Name"] .'</td><td>'.$data["email"].'</td><td>'.$data["Age"].'</td><td>'.$data["DOB"].'</td> <td>'.$data["Phone_number"].'</td></tr>
       ';
        }
        
    }
  }
 ?>