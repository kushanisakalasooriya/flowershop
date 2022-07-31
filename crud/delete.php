<?php

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $databaseName = "form";

        // create connection
        $connection = new mysqli($serverName, $userName, $password, $databaseName);

        $sql = "DELETE FROM flowers WHERE id=$id";
        $connection->query($sql);
    }

    header("Location: index.php");
    exit;
?>