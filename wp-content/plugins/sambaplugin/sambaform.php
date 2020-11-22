<?php
/**
 * @package Sambaplugin
 * @version 1.0.0
 */
/*
Plugin Name: sambaSform 
PlXugin URI: https://samba-diaw.vercel.app/
Description: sambaform plugin est un plugin made in senegal qui vous facilite la création de formulaires de contact pour vos sites web .
Author: Samba DIAW
Version: 1.0.0
Author URI: https://samba-diaw.vercel.app/
*/ 

//mettre en place le formulire de contact
function sambaform(){
    $content = '';
    $content .= '<h3>Remplissez ce formulaire    </br>
    </h3> ';

    $content .= '<form method="post" action="http://localhost/App/Yenima/index.php/merci/" >';
    $content .= '<label for="prenom">Prenom</label>';
    $content .= '<input type="text" name="prenom" class="form-control" placeholder="Votre prenom"/>    </br>
    ';


    $content .= '<label for="nom">Nom</label> ';
    $content .= '<input type="text" name="nom" class="form-control" placeholder="Votre nom" /> </br>';

    $content .= '<label for="email">Email</label> ';
    $content .= '<input type="email" name="email" class="form-control" placeholder="Votre email"/></br>';
    
    $content .= '<label for="message">Votre message</label> ';
    $content .= '<textarea type="text" name="message" class="form-control" placeholder="Votre message"> </textarea></br>';

    $content .= '<input type="submit" name="submit" class="btn btn-md btn-primary" value="Envoyer" />';
    
    $content .= '</form>';
    return $content;
}


//Recevoire les données du formulaire sur le mail de l'administrateur

    function capturedata(){
        if (isset($_POST['submit']))
        
        {
            $prenom = sanitize_text_field($_POST['prenom']);
            $nom = sanitize_text_field($_POST['nom']);
            $email = sanitize_text_field($_POST['email']);
            $message = sanitize_textarea_field($_POST['message']);

            $to = 'sambadiawrt@gmail.com';
            $subject = 'message visiteur de mon site';
            $message = ''.$prenom.' - '.$nom.' - '.$email.' - '.$message;

            wp_mail($to,$subject,$message);


        }
    }
add_shortcode('samba','sambaform');

?>