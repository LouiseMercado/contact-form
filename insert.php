<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['operation']) && $_POST['operation'] == 'insert') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contact";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $gender = $_POST['gender'];
    $subjects = implode(", ", $_POST['subjects']);
    $message = $_POST['message'];

    $sql = "INSERT INTO contacts (name, email, subject, gender, subjects, message)
            VALUES ('$name', '$email', '$subject', '$gender', '$subjects', '$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location: thankyou.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: thankyou.html"); // Redirect if accessed directly
}
?>
