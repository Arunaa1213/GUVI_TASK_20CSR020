
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
        $name = $data['name'];
        $email = $data['email'];
        $dob = $data['dob'];
        $contact = $data['phone'];
        echo '<script>localStorage.setItem("name",$name);</script>';
        echo '<script>localStorage.setItem("email",$email);</script>';
        echo '<script>localStorage.setItem("dob",$dob);</script>';
        echo '<script>localStorage.setItem("contact",$phone);</script>';
        echo '<script type=\"text/javascript\">console.log("password",$value);</script>';
        if($data['upswd1'] === $password)
        {
        
            $man = new MongoDB\Driver\Manager("mongodb+srv://arunaa_s:arunaa_s@guvi_task_20csr020.tohgkb0.mongodb.net/?retryWrites=true&w=majority");
                $col = "guvi_db.users";
                $localIP = getHostByName(getHostName());
                $filter = ["_id" => $email];
                $update = ['$set' => [
                    "lastlog" => $_POST['time'],
                    "logout" => $_POST['time1'],
                    "last_loggedin_ip" => $localIP ]
                ];
                $bulk = new MongoDB\Driver\BulkWrite();
                $bulk->update($filter, $update);
                $man->executeBulkWrite($col, $bulk);

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