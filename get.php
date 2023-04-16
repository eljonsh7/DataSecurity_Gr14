<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'datasecurity';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $key = $_POST['key'] ?? '';
    $date = $_POST['date'] ?? '';
    $dateF = date("Y-m-d", strtotime($date));
    $search_type = $_POST['search_type'] ?? '';

    if ($search_type === 'key') {
        $stmt = $conn->prepare('SELECT `message`, `date` FROM Messages WHERE `Key` = ?');
        $stmt->bind_param('s', $key);
    } 
    // else {
    //     $stmt = $conn->prepare('SELECT `message`, `date` FROM Messages WHERE DATE(`Date`) = ?');
    //     $stmt->bind_param('s', $dateF);
    // }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<table>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr><td>' . $row['message'] . '</td><td>' . $row['date'] . '</td></tr>';
        }
        echo '</table>';
    } else {
        echo 'No results found.';
    }
}