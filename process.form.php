<?php
$username=$_POST['username'];
$password=$_POST['pass'];
if(!empty($username) || !empty($password)){
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="Jahenda";

    $conn=new mysqli($host,$dbUsername,$dbname);
    if(mysqli_connect_error()){
        die("Connect Error('.mysqli_connect_error()')".mysqli_connect_error());
    }else{
        $SELECT="SELECT email from user_sign_in where email=? limit 1";
        $INSERT="INSERT into user_sign_in(username,password,email) values (?,?,?)";

        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result("s",$email);
        $rnum=$stmt->num_rows;

        if(rnum==0){
            $stmt->close();
            $stmt->$conn_prepare($INSERT);
            $stmt->bind_param("sss",$username,$password, $email);
            $stmt->execute();
            echo 'new record inserted successfully';
        }
        else{
            echo "someone already signed in with this email";
            $stmt->close();
            $conn->close();
        }
    }

}
else {
    echo"all fields are required!";
    die();
}
print_r($_POST);
?>