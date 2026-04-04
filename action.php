<?php
$host = "localhost";
$user = "root";
$pass = "";
//connection to server
$conn = new mysqli($host,$user,$pass);
//create db if connection is successfully
if(!$conn->connect_error){
    $conn->query("CREATE DATABASE IF NOT EXISTS students_db") or die("database not created".$conn->connect_error);
}else{
    echo "connection failed".$conn->connect_error;
}
//create table when the database "students" is selected
if(mysqli_select_db($conn,"students_db")){
   $table = $conn->query(
        "CREATE TABLE IF NOT EXISTS student_info(
        studentID int AUTO_INCREMENT,
        fname varchar(100) not null,
        sname varchar(100) not null,
        email varchar(20) not null,
        gender varchar(5) not null,
        PRIMARY KEY (studentID)
        )
        "
    );
    //insert data only if the table is created
    if($table){
        //check the method if is post
        if($_SERVER['REQUEST_METHOD'] === "POST"){

            //prepare stmt and bind
            $stmt = $conn->prepare("INSERT INTO student_info(fname,sname,email,gender) VALUES (?,?,?,?)");
            $stmt->bind_param("ssss",$fname,$sname,$email,$gender);
            //set parameters and execute
            $fname = $_POST['fname'];
            $sname = $_POST['sname'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            //check if stmt is executed
            if($stmt->execute()){
                echo "new student registered successfully";
                $stmt->close();
            }else{
                echo"fail to register new student".$conn->error;
            }
        }
        
    }else{
        echo "table not created".$conn->error;
    }
    
}else{
    echo"no database selected".$conn->error;
}
