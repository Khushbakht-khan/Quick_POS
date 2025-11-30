<?php
session_start();

$errors = [];
$old = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $old['name'] = $_POST['name'] ?? '';
    $old['email'] = $_POST['email'] ?? '';
    $old['message'] = $_POST['message'] ?? '';

    

} else {
    header("Location: index.php");
    exit();
}
?>
