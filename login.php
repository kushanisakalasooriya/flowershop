<?php 
    session_start();
    include "db_conn.php";

    $email = "";
    $error = "";
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //server: localhost, mysql_user: root, password: 0000, database: shop
    // $con = new mysqli("localhost", "root", "", "form");

    //Let use prepared statements to avoid "sql injection attacks"
    $statement = $con->prepare("SELECT id, username, password FROM users WHERE email = ?");
    
    // Bind variables to the prepared statement as parameters
    $statement->bind_param('s', $email);

    // execute statement
    $statement->execute();

    // bind result variables
    $statement->bind_result($id, $username, $hashed_password);

    // fetch values
    if ($statement->fetch()) {
        if(password_verify($password, $hashed_password)){
            // Password is correct
            
            // Store data in session variables
            $_SESSION["authenticated"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;
            // $_SESSION[""] = $;
            $_SESSION["email"] = $email;
            // $_SESSION["phone"] = $phone;
            $_SESSION["hashed_password"] = $hashed_password;
            // $_SESSION["created_at"] = $created_at;
            
            // Redirect user to orders page
            echo'
            <script>
                alert("Successfully Logged");
                window.location = "homepage.html";
            </script>
            ';
            // header("location: homepage.html");
            exit;
        }
    }else{

        echo'
        <script>
            alert("Invalid Login");
            window.location = "loginpage.php";
        </script>
        ';
        // $error = "Email or Password invalid";
        // header("Location: loginpage.php");
            exit();
    }

   
}

    // if(isset($_POST['email']) && isset($_POST['password'])) {

    //     function validate($data) {
    //         $data = trim($data);
    //         $data = stripslashes($data);
    //         $data = htmlspecialchars($data);
    //         return data;
    //     }
    // }

    // $email = validate($_POST['email']);
    // $pass = validate($_POST['password']);

    // if(empty($email)){
    //     header ("Location: loginpage.php?error=User name is required");
    //     exit();
    // }
    // else if(empty($pass)) {
    //     header ("Location: loginpage.php?error=Password is required");
    //     exit();
    // }

    // $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'  limit 1";

    // $result = mysqli_query($con, $sql);

    // if(mysqli_num_rows($result) === 1) {
    //     $row = mysqli_fetch_assoc($result);
    //     if($row['email'] === $email && $row['password'] === $pass) {

    //         echo'
    //             <script>
    //                 alert("Login Successfully");
    //                 window.location = "homepage.html";
    //             </script>
    //             ';

    //         $_SESSION['email'] = $row['email'];
    //         $_SESSION['username'] = $row['username'];
    //         $_SESSION['id'] = $row['id'];

    //         // header("Location: homepage.html");
    //         exit();
    //     }
    //     else{
    //         echo'
    //             <script>
    //                 alert("Login Successfully");
    //                 window.location = "homepage.html";
    //             </script>
    //             ';
    //         exit();
    //     }
    // }
    // else {
    //     header("Location: loginpage.php");
    //     exit();
    // }


    
?>