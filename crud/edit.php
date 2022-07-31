<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "form";

// create connection
$connection = new mysqli($serverName, $userName, $password, $databaseName);

    $id = "";
    $name = "";
    $price = "";
    $image = "";
    $description = "";

    $error_message = "";
    $success_message = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // GET method: show the details of the flower

        if (!isset ($_GET["id"])) {
            header("Location: index.php");
            exit;
        }

        $id = $_GET["id"];

        // read the row of the selected flower details from database
        $sql = "SELECT * FROM flowers WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("Location: index.php");
            exit;
        }

        $name = $row["name"];
        $price = $row["price"];
        $image = $row["image"];
        $description = $row["description"];
    }
    else {
        // POST method: update the details of the flower
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $image = $_POST["image"];
        $description = $_POST["description"];

        do {
            if (empty($id) || empty($name) || empty($price) || empty($description) || empty($image)) {
                $error_message = "ALL the felid are required!";
                break;
            }

            // add new flower to database

            $sql = "UPDATE flowers " . 
                    "SET name = '$name', price = '$price', description='$description', image='$image' " .
                    "WHERE id = $id";

            $result = $connection->query($sql);

            if (!$result) {
                $error_message = "Invalid Query: " . $connection->error;
                break;
            }

            $success_message = "Flower Update Successfully!";

            header("Location: index.php");
            exit;

        } while (false);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Add Flowers</title>
</head>
<body>
    <div class="container my-5">
        <h2>Insert New Flowers</h2>

        <?php
            if(!empty($error_message)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$error_message</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                </div>
                ";
            }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $price; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Image URL</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="image" value="<?php echo $image; ?>">
                </div>
            </div>

            <?php
                if( !empty($success_message)) {
                    echo "
                    <div class='row mb-3'>
                        <div class = 'offset-sm-3 col-sm-6'>
                            <div>
                                <strong>$success_message</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>

    </div>
</body>
</html>