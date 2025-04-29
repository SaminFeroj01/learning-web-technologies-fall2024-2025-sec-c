<?php
$name = $_POST["name"] ?? '';
$email = $_POST["email"] ?? '';
$message = $_POST["message"] ?? '';

$errors = [];

if (empty($name)) {
    $errors[] = "Name is required.";
}

if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

if (empty($message)) {
    $errors[] = "Message is required.";
}

if (!empty($errors)) {
    echo "<h3>Errors:</h3><ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul><a href='form.html'>Go back</a>";
} else {
    echo "<h3>Form submitted successfully!</h3>";
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Message: " . nl2br(htmlspecialchars($message));
}
?>
