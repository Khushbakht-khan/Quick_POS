<?php
session_start();

$errors = [];
$old = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $old['name'] = $_POST['name'] ?? '';
    $old['email'] = $_POST['email'] ?? '';
    $old['message'] = $_POST['message'] ?? '';

    if (empty($_POST["name"])) {
        $errors[] = "Name is required";
    }

    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($_POST["message"])) {
        $errors[] = "Message is required";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $old;
        header("Location: index.php#contact");
        exit();
    } else {
        // Simulate success
        header("Location: thank-you.html");
        exit();
    }

} else {
    header("Location: index.php");
    exit();
}
?>
