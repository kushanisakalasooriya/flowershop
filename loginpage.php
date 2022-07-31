<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flora Palace</title>
    <link rel="stylesheet" href="styled.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <img class="logo" src="kk.png"></img>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICE</a></li>
                    <li><a href="#">DESIGN</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>

            <div class="search">
                <div>
                    <input class="srch" type="search" name="" placeholder="Search...">
					<button type="submit" class="btn"><i style="margin-top: 5px" class='bx bx-search' ></i></button>
				</div>
                <!-- <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="#"> <button class="btn">Search</button></a> -->
            </div>

            
        </div> 
        <div class="content">
            <h1>K&K Custom <br><span>Floral</span> <br>Greenwood Village Florist</h1>
            <p class="par">For the best and freshest flowers in Greenwood Village, <br> DTC Custom Floral has exactly what you’re looking for!
                <br> Check out our wide selection of flower arrangements to make your next occasion memorable.</p>

                <button class="cn"><a href="#">JOIN US</a></button>

                <form action="login.php" method="post">
                <div class="form">
                    <h2>Login Here</h2>
                    <input type="email" name="email" placeholder="   Enter Email Here">
                    <input type="password" name="password" placeholder="   Enter Password Here">
                    <button class="btnn" type="submit" name="login">Sign In</button>

                    <?php 
                            // if (!empty($error)) {
                            //     // echo "<p style='color:red;'>$error</p>"; 
                            //     echo'
                            //     <script>
                            //         alert("Invalid Login");
                            //         window.location = "homepage.html";
                            //     </script>
                            //     ';
                            // }
                            ?>


                    <p class="link">Don't have an account<br>
                    <a href="register.html">Sign up </a> here</a></p>
                    <p class="liw">Log in with</p>

                    <div class="icons">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                    </div>

                </div>
                </form>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>