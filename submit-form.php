<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phonenumber = strip_tags(trim($_POST["phone-number"]));
    $date = strip_tags(trim($_POST["date"]));
    $image = strip_tags(trim($_POST["image"]));
    $item1 = strip_tags(trim($_POST["item1"]));

    if (empty($name) OR empty($phonenumber) OR empty($date) OR empty($item1) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit;
    }

    $recipient = "saga.holmstrom@eduvantaa.fi";
    $subject = "New order from $name";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Phone number: $phonenumber\n\n";
    $email_content .= "Date: $date\n\n";
    $email_content .= "Image: $image\n\n";
    $email_content .= "Items: $item1\n\n";

    $email_headers = "From: $name <$email>";

    mail($recipient, $subject, $email_content, $email_headers);
}
?>
