<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $key = $_POST['key'];
        $message = $_POST['message'];
        $encr = $_POST['encrypted'];

        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = 'root';
        $db_name = 'datasecurity';
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $stmt = $conn->prepare('INSERT INTO messages (`key`, `message`, `date`) VALUES (?, ?, NOW())');
        $stmt->bind_param('ss', $key, $encr);
        $stmt->execute();

        echo "Message inserted successfully.";
    }
?>
