<?php
namespace model;


class Form
{
    private $_id;
    private $_type;
    private $_name;
    private $_email;
    private $_tel;
    private $_message;
    private $_date;

    public function add($type, $name, $email, $tel, $message)
    {
        $name = addslashes($name);
        $message = addslashes($message);
        $return = array("return" => "", "error" => "");
        $messageClass = new Message();
        $messages = $messageClass->getMessages();
        if (!empty($type) && !empty($name) && !empty($email) && !empty($tel) && !empty($message)) {
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
            $bdd = new Bdd();
            $date = new \DateTime();
            $array = array(
                "type" => $type,
                "name" => $name,
                "email" => $email,
                "tel" => $tel,
                "message" => $message,
                "date" => $date->format("d-m-Y H:i:s"),
            );
            $add = $bdd->insert("form", $array);
            if ($add) {
                $return["return"] = true;
                $return["error"] = "";
                return $return;
            } else {
                $return["return"] = false;
                $return["error"] = $messages["error"]["addForm"];
                return $return;
            }
        } else {
            $return["return"] = false;
            $return["error"] = $messages["error"]["emptyField"];
            return $return;
        }
    }
}