<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT password FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
        echo "success";
    } else {
        echo "wrong password";
    }
} else {
    echo "no user";
}

$conn->close();
?>
