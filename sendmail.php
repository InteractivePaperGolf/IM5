<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $nachricht = trim($_POST["nachricht"]);

    // Hier sollten Sie Ihre E-Mail-Adresse einfügen
    $empfaenger = "jan.christen@stud.fhgr.ch";
    $betreff = "Neue Kontaktanfrage von $name";

    $email_inhalt = "Name: $name\n";
    $email_inhalt .= "Email: $email\n\n";
    $email_inhalt .= "Nachricht:\n$nachricht\n";

    $headers = "From: $name <$email>";

    if (mail($empfaenger, $betreff, $email_inhalt, $headers)) {
        echo "Vielen Dank! Ihre Nachricht wurde gesendet.";
    } else {
        echo "Oops! Etwas ist schief gelaufen und wir konnten Ihre Nachricht nicht senden.";
    }
} else {
    echo "Oops! Etwas ist schief gelaufen.";
}

?>
