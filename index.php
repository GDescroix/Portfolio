<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['contact_mail'], $_POST['mail'], $_POST['sender'], $_POST['email']) && !empty($_POST['contact_mail']) && !empty($_POST['email']) && !empty($_POST['sender']) && empty($_POST['mail']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

    $message = strip_tags($_POST['contact_mail']);
    $sender = strip_tags($_POST['sender']);
    $email = strip_tags($_POST['email']);

    require_once 'includes/connect.php';

    // création requete
    $sql = "INSERT INTO `messages` (`txtmessage`, `name`, `mail`) VALUES ('$message', '$sender', '$email');";

    // préparation de la requête
    $requete = $db->prepare($sql);

    $requete->execute();

    require_once "./includes/PhPMailer/Exception.php";
    require_once "./includes/PhPMailer/PHPMailer.php";
    require_once "./includes/PhPMailer/SMTP.php";

    $mail = new PHPMailer();

    try {
        $mail->isSMTP();
        $mail->Host = "localhost";
        $mail->Charset = "utf-8";

        $mail->addAddress("guydcx@gmail.com");
        $mail->setFrom("g.descroix@codeur.online");

        $mail->Subject = "CONTACT PORTFOLIO";
        $mail->Body = "Le mail est envoyé par : " . $email . "\n\nSon nom est : " . $sender . "\n\nEt voici son message :\n" . $message;

        $mail->send();
        header("Location: ./index.php");
        exit;
    } catch (Exception $error) {
        echo "Message non envoyé. Erreur: {$mail->ErreurInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Yaldevi:wght@300&display=swap" rel="stylesheet">
    <script src="./js/dark.js" defer></script>
    <link rel="icon" href="./img/favicon_GD.svg">
    <link rel="stylesheet" href="./css/style.css">
    <title>Portfolio</title>
</head>

<body>
    <header>
        <img src="./img/Newlogo.svg" alt="logo" width="100%" class="logo">
        <div class="card_name">
            <p class="name">DESCROIX</p>
            <p class="name">Guy</p>
        </div>
    </header>

    <main>

        <h1 class="titre">Présentation</h1>
        <div class="card_info">
            <div class="card_prez">
                <img src="./img/description.png" alt="descript" width="100%" class="blk">
                <img src="./img/description_w.png" alt="descript" width="100%" style="display: none;" class="wht">
                <span>Je m'appelle Guy Descroix, je suis un jeune développeur possédant un titre RNCP de Web Designer,
                    décroché chez OnlineFormaPro</span>
            </div>
        </div>

        <h1 class="titre">Compétences</h1>
        <div class="card_comp">
            <div class="card_dual first_card_dual">
                <img src="./img/logo/html5.png" alt="HTML5" width="100%">
                <span>HTML5</span>
            </div>
            <div class="card_dual">
                <img src="./img/logo/css3.png" alt="CSS3" width="100%">
                <span>CSS3</span>
            </div>
            <div class="card_dual">
                <img src="./img/logo/javascript.png" alt="JS" width="100%">
                <span>JavaScript</span>
            </div>
            <div class="card_dual">
                <img src="./img/logo/php_logo.png" alt="PHP" width="100%">
                <span>PhP</span>
            </div>
            <div class="card_dual">
                <img src="./img/logo/sql_logo.png" alt="PHP" width="100%">
                <span>MySQL</span>
            </div>
            <div class="card_dual">
                <img src="./img/logo/bootstrap.png" alt="BSTRAP" width="100%">
                <span>Bootstrap</span>
            </div>
            <div class="card_dual">
                <img src="./img/logo/wrdprss.png" alt="WordPress" width="100%">
                <span>WordPress</span>
            </div>
            <div class="card_dual">
                <img src="./img/logo/ghub.png" alt="GitKraken" width="100%">
                <span>Github</span>
            </div>
            <div class="card_dual">
                <img src="./img/logo/gimp.png" alt="Gimp" width="100%">
                <span>Gimp</span>
            </div>
            <div class="card_dual">
                <img src="./img/logo/inkscape.png" alt="Inkscape" width="100%">
                <span>Inkscape</span>
            </div>
        </div>

        <h1 class="titre">Projets</h1>
        <div class="proj_cards">
            <div class="project_card">
                <figure>
                    <a href="https://github.com/GDescroix/projet_presentation" target="_blank">
                        <img src="./img/PrezGuyChris.png" alt="projetPrez" width="100%">
                    </a>
                    <figcaption>Projet de présentation et de découverte du HTML/CSS</figcaption>
                </figure>
            </div>
            <div class="project_card marg_proj">
                <figure>
                    <a href="https://github.com/GDescroix/ACS_Music" class="car_card" target="_blank">
                        <img src="./img/ACS_MUSIC/index.png" alt="ACS_MUSIC" width="100%">
                        <img src="./img/ACS_MUSIC/accueil.png" alt="ACS_MUSIC" width="100%">
                        <img src="./img/ACS_MUSIC/play.png" alt="ACS_MUSIC" width="100%">
                    </a>
                    <figcaption>Projet de site web au format mobile permettant d'écouter des musiques via une API
                    </figcaption>
                </figure>
            </div>
        </div>
        <div class="proj_cards">
            <div class="project_card">
                <figure>
                    <a href="https://github.com/GDescroix/SaumHotel" target="_blank">
                        <img src="./img/Hotel_M-G.png" alt="Projet Hotel" width="100%">
                    </a>
                    <figcaption>Projet de création d'un site de réservation d'hôtel fonctionnel</figcaption>
                </figure>
            </div>
        </div>
        </div>
    </main>

    <footer>
        <div class="contact_card">
            <h1 class="contact">Contactez moi</h1>
            <form class="my_form" method="post">
                <label for="sender">Nom :</label>
                <textarea name="sender" id="sender" maxlength="50" placeholder="Votre nom"></textarea>
                <label for="email">Email :</label>
                <textarea name="email" id="email" maxlength="255" placeholder="Votre mail"></textarea>
                <label for="contact_mail">Message :</label>
                <textarea name="contact_mail" id="contact_mail" class="contact_mail" cols="30" rows="10" maxlength="880" placeholder="Votre message"></textarea>
                <textarea name="mail" class="mail" id="mail" cols="30" rows="10"></textarea>
                <button class="my_btn" type="submit">Envoyer</button>
            </form>
        </div>
        <div class="my_info">
            <h1>A propos</h1>
            <div class="infos">
                <p>Mon mail : Guydcx@gmail.com</p>
                <p>Mes réseaux :</p>
                <a href="https://twitter.com/GuyDescroix" target="_blank"><img src="./img/logo/Twitter social icons - rounded square - blue.png" alt="twitter" width="100%"></a>
                <a href="https://www.linkedin.com/in/guy-descroix/" target="_blank"><img src="./img/logo/LI-In-Bug.png" alt="linkedin" width="100%"></a>
            </div>
        </div>
    </footer>

</body>

</html>