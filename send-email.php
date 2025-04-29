
<?php
// Vérifier que le formulaire est bien soumis par la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécuriser les entrées
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);
    
    // Adresse e-mail qui reçoit le message
    $to = "abrahamberne1@gmail.com"; // Remplace par ton vrai email
    
    // Sujet de l'email
    $subject = "Nouvelle demande de devis de $name";
    
    // Corps de l'email
    $body = "Nom: $name\n";
    $body .= "Email: $email\n";
    $body .= "Service souhaité: $service\n";
    $body .= "Message:\n$message";
    
    // Headers
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envoyer l'email
    if (mail($to, $subject, $body, $headers)) {
        // Rediriger vers une page de succès
        header('Location: merci.html'); // (ou afficher un message)
        exit();
    } else {
        echo "Erreur lors de l'envoi de l'email.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
