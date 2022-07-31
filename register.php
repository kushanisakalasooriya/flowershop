<?php

    session_start();
    include "db_conn.php";

    if(!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
        exit('Empty Field(s)');
    }

    if(empty($_POST['username'] || empty($_POST['password']) || empty($_POST['email']))) {
        exit('Values Empty');
    }

    if($stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?')) {
        $stmt->bind_param('s' , $_POST['username']);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows>0){
            echo'
                    <script>
                        alert("Username Already exists. Try again");
                        window.location = "register.html";
                    </script>
                    ';
        }
        else {
            if($stmt = $con->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)')) {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
                $stmt->execute();
                // echo 'Successfully Registered';
                echo'
                    <script>
                        alert("Successfully Registered");
                        window.location = "homepage.html";
                    </script>
                    ';
            }
            else {
                // echo 'Error Occurred';
                echo'
                    <script>
                        alert("Registration fail");
                        window.location = "register.html";
                    </script>
                    ';
            }
        }
        $stmt->close();
    }
    else {

        echo 'Error Occurred';
    }

    $con->close();
?>