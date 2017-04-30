<?php
namespace model;


class Mail
{
    public function sendMail($name, $email, $tel, $message, $idProduit = null)
    {
        $return = array("return" => "", "error" => "");
        $messageClass = new Message();
        $config = new Config();
        $emailTo = $config->getEmailTo();
        $messages = $messageClass->getMessages();
        $subject = "Contact ConceptArtCeramic";
        if (!empty($name) && !empty($email) && !empty($tel) && !empty($message)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $return["return"] = false;
                $return["error"] = $messages["error"]["emailFormat"];
                return $return;
            }
            if (!is_numeric($tel)) {
                $return["return"] = false;
                $return["error"] = $messages["error"]["telFormat"];
                return $return;
            }
            $date = new \DateTime();
            $datesend = $date->format("d-m-Y H:i:s");
            $headers = "MIME-Version: 1.0\r\n";
            $headers = $headers . "Content-Type: text/html; charset=ISO-8859-1\r\n";
            if ($idProduit == null) {
                $messageEmail = '<html><body><h1>Demande de Contact de "' . $name . '"</h1></br><h2>Email: "' . $email . '"</h2></br><h3>Message : "' . $message . '"</h3></body></html>';
            } else {
                $product = new Product($idProduit);
                $productName = $product->getFrName();
                $link = "www.conceptartceramic.com/product/" . $idProduit;
                $messageEmail = '<html><body><h1>Demande de Devis de "' . $name . '"</h1></br><h2>Email: "' . $email . '"</h2></br><h3>Message : "' . $message . '"</h3></br><h4>Produit: <a href="' . $link . '">' . $productName . '</a></a></h4></body></html>';
            }
            $send = mail($emailTo, $subject, $messageEmail, $headers);
            if($send) {
                $return["return"] = true;
                $return["error"] = "";
                return $return;
            } else {
                $return["return"] = false;
                $return["error"] = $messages["error"]["emptyField"];
                return $return;
            }
        } else {
            $return["return"] = false;
            $return["error"] = $messages["error"]["emptyField"];
            return $return;
        }
    }
}