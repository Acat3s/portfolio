<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    $to = "alexandredieu.business@gmail.com";
    $subject = "Nouveau message de $name";
    $headers = "From: $email" . "\r\n" . "Reply-To: $email" . "\r\n" . "Content-Type: text/plain; charset=UTF-8";

    $mailBody = "Nom: $name\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $mailBody, $headers)) {
        echo "<script>alert('Message envoyé avec succès !'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('Erreur lors de l\'envoi du message.'); window.location.href='contact.html';</script>";
    }
} else {
    header("Location: contact.html");
    exit();
}
?>
