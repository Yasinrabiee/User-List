<?php
    require_once '../config.php'; 

    $sql = "SELECT id, username, pass, email FROM uuu_user";
    $result = $conn->query($sql);

    $users = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = [
                'id' => $row['id'],
                'username' => htmlspecialchars($row['username']),
                'password' => htmlspecialchars($row['pass']),
                'email' => htmlspecialchars($row['email'])
            ];
        }
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($users);
?>