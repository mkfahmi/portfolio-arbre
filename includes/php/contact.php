<div id="contact">
    <p id="error"></p>

    <form method="POST" action="#">
        <input type="email" name="email" id="email" placeholder="Entrez votre adresse mail" required>
        <div id="contact_hidden">
            <br>
            <input type="text" name="object" id="object" placeholder="Quel est l'objet de votre message ?" required><br>
            <textarea name="message" placeholder="Quel est votre message ?" required></textarea><br>
            <div id="recaptcha" class="g-recaptcha" data-sitekey="6LeFtQMTAAAAAKVMRXQAjpm4zlUEOe_mjMXqPS53"></div>
        </div>
        <button>Me contacter</button>
    </form>


<?php

if (isset($_POST['email']))
{
    
 /*   // clé secrète pour communiquer avec Google
    $secret = "6LeFtQMTAAAAAGW5loqwT4l2RqSN6lFCgR7g1ckz";

    // réponse vide
    $response = null;

    // vérification de la clé secrète
    $reCaptcha = new ReCaptcha($secret);*/

    // si le formulaire a été soumis, vérifier la réponse du recaptcha
    if ($_POST["g-recaptcha-response"]) 
    {
        
        $response = $_POST['g-recaptcha-response'];
        $postfields = array(
            'secret' => '6LeFtQMTAAAAAGW5loqwT4l2RqSN6lFCgR7g1ckz',
            'response' => $response
        );

        $requestUrl = "https://www.google.com/recaptcha/api/siteverify";

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $requestUrl);
        curl_setopt($curl, CURLOPT_COOKIESESSION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields);

        $return = curl_exec($curl);
        curl_close($curl);
        
        $return = json_decode($return);

        if ($return != null && $return->success == true) 
        {
            // Envoi du mail
            $confirmation = 'Bonjour à vous !

Je vous remercie de m\'avoir contacté. J\'ai bien reçu votre message, et je vous répondrai sans faute dès que possible.
En attendant, voici un petit récapitulatif de ce que vous avez envoyé.

Objet : '.$_POST['object'].'

Message :
'.$_POST['message'];

            mail("fahmi_m@etna-alternance.net", $_POST['object'], $_POST['message']);
            mail($_POST['email'], "Message envoyé !", $confirmation);
            
            echo "<p>Merci pour votre message. Vous avez normalement reçu un accusé de réception par mail. Au moindre problème, n'hésitez pas à me contacter directement sur <strong>fahmi_m@etna-alternance.net</strong></p>";
        } 
        else 
        {
            echo "<p>Votre message n'a malheureusement pas pu être envoyé. Vous pouvez réessayer, ou me contacter directement sur <strong>fahmi_m@etna-alternance.net</strong></p>";
        }
    }
    else 
    {
        echo "<p>Votre message n'a malheureusement pas pu être envoyé. Vous pouvez réessayer, ou me contacter directement sur <strong>fahmi_m@etna-alternance.net</strong></p>";
    }
}
?>
</div>