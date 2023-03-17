
<?php
// session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
$email = $_POST['email'];
$password = $_POST['upswd1'];
echo '<script>console.log("helow");</script>';
$con = new mysqli("localhost","root","","guvi_db");
echo $email;
// $_SESSION['email'] = $email;

if($con->connect_error)
{
    die("Failed to connect : ".$con->connect_error);
}
else{
    $sql = "select name from register where email = :email";
    $stmt = $con->prepare($sql);

    $stmt->bindParam(":email",$email);
    $stmt->execute();
    // $stmt_result = $stmt->fetch();
    $stmt_result = $stmt->get_result();

    if($stmt_result->num_rows >0)
    {
        $data = $stmt_result->fetch_assoc();
        // $value = $data['upswd1'];
        // echo '<script>localStorage.setItem("name",$value);</script>';
        echo '<script type=\"text/javascript\">console.log("password",$value);</script>';
        if($data['upswd1'] === $password)
        {
        
            
            header("Location: http://localhost:81/GUVI_TASK_20CSR020/profile.html");
            

        }
        else{
            echo "<h2> Invaild Email or password </h2>";
        }
    }
    else{
        echo "<h2> Invaild Email or password</h2>";
    }
}


?>