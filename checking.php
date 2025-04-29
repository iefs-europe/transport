

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);

    // Ton adresse Gmail
    $to = "abrahamberne1@gmail.com";  // Remplace par ton adresse Gmail
    $subject = "Demande de devis de $name";
    
    // Le corps du message en HTML
    $body = "
        <html>
        <head>
            <title>Demande de devis</title>
        </head>
        <body>
            <p><strong>Nom:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Service souhaité:</strong> $service</p>
            <p><strong>Message:</strong> $message</p>
        </body>
        </html>
    ";

    // En-têtes de l'email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Votre demande a été envoyée avec succès. Nous vous répondrons rapidement !</p>";
    } else {
        echo "<p>Erreur lors de l'envoi de votre demande. Veuillez réessayer.</p>";
    }
}
?>
