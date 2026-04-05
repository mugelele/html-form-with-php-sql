<?php
$host = "localhost";
$user = "root";
$pass = "";
//connection to server
$conn = new mysqli($host,$user,$pass);
//create db if connection is successfully
if($conn->connect_error){
    die("database not created".$conn->connect_error);
}else{
    $conn->query("CREATE DATABASE IF NOT EXISTS students_db");
}
//create table when the database "students_db" is selected
if(mysqli_select_db($conn,"students_db")){
   $table = $conn->query(
        "CREATE TABLE IF NOT EXISTS student_info(
        studentID int AUTO_INCREMENT,
        fname varchar(100) not null,
        sname varchar(100) not null,
        email varchar(20) not null,
        gender varchar(255) not null,
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

    //fetch data when the button is  clicked
    if(isset($_GET['fetch'])){
        $result = $conn->query("SELECT fname, sname FROM student_info ");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row['fname']." ".$row['sname'];
                echo "<br>";
            }
        }else{
            echo "no data found";
        }
    }
    
}else{
    echo"no database selected".$conn->error;
}


