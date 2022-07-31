<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Flower shop</title>
</head>
<body>
    <div class="container my-5">
        <h2>List of flowers</h2>
        
        <a class="btn btn-primary" href="create.php">New flowers</a>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Date of Added</th>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>

            

                <?php
                    $serverName = "localhost";
                    $userName = "root";
                    $password = "";
                    $databaseName = "form";

                    // create connection
                    $connection = new mysqli($serverName, $userName, $password, $databaseName);

                    // check connection
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }

                    // read all row from database table
                    $sql = "SELECT * FROM flowers";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }

                    // read data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[image]</td>
                            <td>$row[name]</td>
                            <td>$row[price]</td>
                            <td>$row[description]</td>
                            <td>$row[created_at]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Update</a>
                                <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                
                ?>

            </tbody>
        </table>
    </div>
</body>
</html>