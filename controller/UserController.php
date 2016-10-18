<?php
namespace controller;
/**
 * UserController.php
 *
 *
 * PHP 7.0.8
 *
 * @category Model
 * @package  Model
 * @author   isma91 <ismaydogmus@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 */
use model\Bdd;
use model\Config;
use model\Message;
use model\Product;
use model\SiteInfo;
use model\User;
use model\View;
/**
 * Class UserController
 * @package controller
 */
class UserController
{
    /**
     *
     */
    public function add()
    {
        $lastname =  $_POST["lastname"];
        $firstname =  $_POST["firstname"];
        $login =  $_POST["login"];
        $email =  $_POST["email"];
        $password =  $_POST["password"];
        $user = new User();
        $view = new View("admin#register");
        $message = new Message();
        $messages = $message->getMessages();
        foreach ($_POST as $field => $value) {
            if (empty($value)) {
                $view->set("error", $messages["error"]["emptyField"]);
                $view->render();
                return;
                break;
            }
        }
        if ($user->duplicateEmail($email)) {
            foreach ($_POST as $field => $value) {
                $view->set($field, $value);
            }
            $view->set('error', $messages["error"]["duplicateEmail"]);
            $view->render();
        } else {
            $user->add($lastname, $firstname, $login, $email, $password);
            $view->set("success", sprintf($messages["success"]["adminCreated"], $login));
            $view->render();
        }
    }

    /**
     *
     */
    public function login()
    {
        $message = new Message();
        $messages = $message->getMessages();
        $viewLogin = new View("admin#login");
        $viewPanel = new View("admin#panel");
        foreach ($_POST as $field => $value) {
            if (empty($value)) {
                $viewLogin->set('loginEmail', $_POST["loginEmail"]);
                $viewLogin->set("error", $messages["error"]["emptyField"]);
                $viewLogin->render();
                return;
                break;
            }
        }
        $user = new User();
        if (!$user->userCredential($_POST["loginEmail"], $_POST["password"])) {
            $viewLogin->set('loginEmail', $_POST["loginEmail"]);
            $viewLogin->set('error', $messages["error"]["wrongCredential"]);
            $viewLogin->render();
            return;
        }
        $userCredential = $user->getUser();
        if ($userCredential !== false) {
            foreach ($userCredential as $name => $value) {
                $viewPanel->set($name, $value);
            }
        }
        $viewPanel->render();
    }

    /**
     *
     */
    public function adminLogin()
    {
        $this->redirectIfLoged("admin#login");
    }

    /**
     *
     */
    public function adminRegister()
    {
        $this->redirectIfNotLoged("admin#register", array(), false);
    }

    public function adminPanel()
    {
        $bdd = new Bdd();
        $field = $_SESSION["lang"] . "Name";
        $arrayNotNull = array("form.name", "form.email", "form.tel", "form.message", "form.idProduct", "form.date", "product.$field");
        $arrayNull = array("name", "email", "tel", "message", "date");
        $innerJoin = array(
            array("table" => "product", "on" => "product.id = form.idProduct")
        );
        $formsNull = $bdd->select("form", $arrayNull, "idProduct IS NULL");
        $formsNotNull = $bdd->select("form", $arrayNotNull, "form.idProduct IS NOT NULL", $innerJoin);
        $this->redirectIfNotLoged("admin#panel", array("formsNull" => $formsNull, "formsNotNull" => $formsNotNull));
    }

    public function thing($type, array $arrayValue = array(), $error = null)
    {
        $thing = array();
        $thing["slug"] = $type;
        $array = array(
            "frCategory" => array("name" => "Catégorie", "title" => "une nouvelle"),
            "enCategory" => array("name" => "Category", "title" => "add a new"),
            "frColor" => array("name" => "Couleur", "title" => "une nouvelle"),
            "enColor" => array("name" => "Color", "title" => "add a new"),
            "frMaterial" => array("name" => "Materiau", "title" => "un nouveau"),
            "enMaterial" => array("name" => "Material", "title" => "add a new"),
            "frSize" => array("name" => "Taille", "title" => "une nouvelle"),
            "enSize" => array("name" => "Size", "title" => "add a new"),
            "frUsage" => array("name" => "Utilisation", "title" => "une nouvelle"),
            "enUsage" => array("name" => "Usage", "title" => "add a new"),
            "frProduct" => array("name" => "Produit", "title" => "add a new"),
            "enProduct" => array("name" => "Product", "title" => "add a new"),
        );
        $arrayLabel = array(
            "fr" => array("fr" => "en Français", "en" => "en Anglais"),
            "en" => array("fr" => "in French", "en" => "in English")
        );
        $field = $_SESSION["lang"] . ucfirst($type);
        $thing["name"] = $array[$field]["name"];
        $thing["title"] = $array[$field]["title"];
        $thing["field"] = array(
            "fr" => array("name" => "fr" . ucfirst($type), "label" => $arrayLabel[$_SESSION["lang"]]["fr"]),
            "en" => array("name" => "en" . ucfirst($type), "label" => $arrayLabel[$_SESSION["lang"]]["en"])
        );
        $thing["value"] = array("fr" => "", "en" => "");
        if (!empty($arrayValue)) {
            $thing["value"] = $arrayValue;
        }
        if ($type === "size") {
            $thing["field"] = array("width", "height");
            $thing["label"] = array(
                "fr" => array("Largueur", "Longueur"),
                "en" => array("Width", "Height")
            );
        }
        if ($type === "product") {
            $site = new SiteInfo();
            $arrayField = array(
                "category" => "getCategories",
                "color" => "getColors",
                "material" => "getMaterials",
                "size" => "getSizes",
                "usage" => "getUsages"
            );
            foreach ($arrayField as $type => $func) {
                $thing["product"][$type] = $site->$func();
            }
            $thing["label"] = array(
                "category" => array("fr" => "Catégorie", "en" => "Category"),
                "color" => array("fr" => "Couleur", "en" => "Color"),
                "material" => array("fr" => "Materiau", "en" => "Material"),
                "size" => array("fr" => "Taille", "en" => "Size"),
                "usage" => array("fr" => "Utilisation", "en" => "Usage")
            );
        }
        $this->redirectIfNotLoged("admin#add", array("error" => $error, "thing" => $thing));
    }

    public function addThing($type)
    {
        if ($type === "product") {
            $message = new Message();
            $product = new Product();
            $messages = $message->getMessages();
            $array = array("fr" => $_POST["frName"], "en" => $_POST["enName"]);
            $arrayValue = array();
            $arrayValue["frDescription"] = $_POST["frDescription"];
            $arrayValue["enDescription"] = $_POST["enDescription"];
            $arrayValue["frName"] = $_POST["frName"];
            $arrayValue["enName"] = $_POST["enName"];
            foreach ($_POST as $value) {
                if (empty($value) || empty($_FILES["img"]["name"][0])) {
                    $this->thing("product", $arrayValue, $messages["error"]["emptyField"]);
                    return;
                    break;
                }
            }
            $add = $product->add($_POST["frName"], $_POST["enName"], $_POST["category"], $_POST["color"], $_POST["material"], $_POST["size"], $_POST["usage"], $_POST["frDescription"], $_POST["enDescription"], $_FILES["img"]);
            if ($add["error"] !== "") {
                $this->thing("product", $arrayValue, $add["error"]);
            } else {
                $view = new View("admin#panel");
                $userClass = new User();
                $user = $userClass->getUser();
                if ($user !== false) {
                    foreach ($user as $name => $value) {
                        $view->set($name, $value);
                    }
                }
                $view->set("success", sprintf($messages["success"]["addProduct"], $array[$_SESSION["lang"]]));
                $view->render();
            }
        } else {
            $frKey = "fr" . ucfirst($type);
            $enKey = "en" . ucfirst($type);
            $addTypeName = "add" . ucfirst($type);
            $duplicateTypeName = "duplicate" . ucfirst($type);
            $arrayValue = array('fr' => $_POST[$frKey], "en" => $_POST[$enKey]);
            if ($type === "size") {
                $arrayValue = array("width" => $_POST["width"], "height" => $_POST["height"]);
            }
            $message = new Message();
            $messages = $message->getMessages();
            foreach ($_POST as $value) {
                if (empty($value)) {
                    $this->thing($type, $arrayValue, $messages["error"]["emptyField"]);
                    return;
                    break;
                }
            }
            $site = new SiteInfo();
            $add = $site->add($type, $arrayValue);
            if ($add) {
                $view = new View("admin#panel");
                $userClass = new User();
                $user = $userClass->getUser();
                if ($user !== false) {
                    foreach ($user as $name => $value) {
                        $view->set($name, $value);
                    }
                }
                $view->set("success", sprintf($messages["success"][$addTypeName], $arrayValue[$_SESSION["lang"]]));
                if ($type === "size") {
                    $view->set("success", sprintf($messages["success"][$addTypeName], $arrayValue["width"] . "x" . $arrayValue["height"]));
                }
                $view->render();
            } else {
                $this->thing($type, $arrayValue, sprintf($messages["error"][$duplicateTypeName], $arrayValue[$_SESSION["lang"]]));
            }
        }
    }

    public function thingPage($type, $error = null, $success = null) {
        $thing = array();
        if ($type === "info") {
            $this->displayThing($type, 0);
        } elseif ($type === "product") {
            $bdd = new Bdd();
            $productsArray = $bdd->select("product", array("*"));
            $thing["thing"] = $productsArray;
        } else {
            $site = new SiteInfo();
            $arrayField = array(
                "category" => "getCategories",
                "color" => "getColors",
                "material" => "getMaterials",
                "size" => "getSizes",
                "usage" => "getUsages"
            );
            $func = $arrayField[$type];
            $thing["thing"] = $site->$func();
            if ($type === "info") {
                $config = new Config();
                $thing = array("maintenance" => $config->getMaintenance());
            }
            $thing["slug"] = $type;
            $array = array(
                "frCategory" => "Catégories",
                "enCategory" => "Categories",
                "frColor" => "Couleurs",
                "enColor" => "Colors",
                "frMaterial" => "Materiaux",
                "enMaterial" => "Materials",
                "frSize" => "Tailles",
                "enSize" => "Sizes",
                "frUsage" => "Utilisations",
                "enUsage" => "Usages",
                "frProduct" => "Produits",
                "enProduct" => "Products",
            );
            $thing["title"] = $array[$_SESSION["lang"] . ucfirst($type)];
            $this->redirectIfNotLoged("admin#thing", array("error" => $error, "success" => $success, "thing" => $thing));
        }
    }

    public function displayThing($type, $id, $error = null, $success = null)
    {
        if ($type === "product") {
        } else {
            $site = new SiteInfo();
            $arrayField = array(
                "category" => "getCategories",
                "color" => "getColors",
                "material" => "getMaterials",
                "size" => "getSizes",
                "usage" => "getUsages"
            );
            $array = array(
                "frCategory" => "Catégorie",
                "frColor" => "Couleur",
                "frMaterial" => "Materiau",
                "frSize" => "Taille",
                "frUsage" => "Utilisation",
                "frProduct" => "Produit",
                "frInfo" => "Information du Site",
            );
            if ($type !== "info") {
                $func = $arrayField[$type];
                $types = $site->$func();
                $thing = array();
                foreach ($types as $idType => $name) {
                    if ($idType == $id) {
                        $thing["id"] = $id;
                        $thing[$_SESSION["lang"]] = $name;
                        break;
                    }
                }
            }
            $thing["slug"] = $type;
            $thing["id"] = $id;
            $thing["title"] = $array[$_SESSION["lang"] . ucfirst($type)];
            $this->redirectIfNotLoged("admin#update", array("error" => $error, "success" => $success, "thing" => $thing));
        }
    }

    public function updateThing($type, $id)
    {
        if ($type === "info") {
            $title = $_POST["title"];
            $description = $_POST["description"];
            $message = new Message();
            $messages = $message->getMessages();
            if (!empty($title) && !empty($description)) {
                $site = new SiteInfo();
                $updateTitle = $site->setTitle($title);
                $updateDescription = $site->setDescription($description);
                $config = new Config();
                if (isset($_POST["maintenance"])) {
                    $maintenance = 'true';
                } else {
                    $maintenance = 'false';
                }
                $config->setMaintenance($maintenance);
                if ($updateTitle === true && $updateDescription === true) {
                    sleep(1);
                    $view = new View("admin#panel");
                    $view->set("success", $messages["success"]["updateInfoSite"]);
                    $view->render();
                } else {
                    $this->displayThing("info", 0, $messages["error"]["updateInfoSite"]);
                }
            } else {
                $this->displayThing("info", 0, $messages["error"]["emptyField"]);
            }
        } elseif ($type === "product") {
        } else {
            $updateTypeName = "update" . ucfirst($type);
            $duplicateTypeName = "duplicate" . ucfirst($type);
            $arrayValue = array("id" => $id, $type => $_POST[$type], $_SESSION["lang"] => $_POST[$type]);
            $message = new Message();
            $messages = $message->getMessages();
            foreach ($_POST as $value) {
                if (empty($value)) {
                    $this->displayThing($type, $id, $messages["error"]["emptyField"]);
                    return;
                    break;
                }
            }
            $site = new SiteInfo();
            $update = $site->update($type, $arrayValue);
            if ($update) {
                $view = new View("admin#panel");
                $userClass = new User();
                $user = $userClass->getUser();
                if ($user !== false) {
                    foreach ($user as $name => $value) {
                        $view->set($name, $value);
                    }
                }
                $view->set("success", sprintf($messages["success"][$updateTypeName], $arrayValue[$_SESSION["lang"]]));
                $view->render();
            } else {
                $this->displayThing($type, $id, sprintf($messages["error"][$duplicateTypeName], $arrayValue[$_SESSION["lang"]]));
            }
        }
    }

    /**
     * @param $viewName
     * @param array $arraySet
     */
    public function redirectIfLoged($viewName, $arraySet = array())
    {
        $userClass = new User();
        $connected = User::is_connected();
        $message = new Message();
        $messages = $message->getMessages();
        if ($connected === true) {
            $view = new View("admin#panel");
            $user = $userClass->getUser();
            if ($user !== false) {
                foreach ($user as $name => $value) {
                    $view->set($name, $value);
                }
            }
            $view->set("error", $messages["error"]["mustNotBeConnected"]);
            $view->render();
        } else {
            $view = new View($viewName);
            if (!empty($arraySet)) {
                foreach ($arraySet as $name => $value) {
                    $view->set($name, $value);
                }
            }
            $view->render();
        }
    }

    /**
     * @param $viewName
     * @param array $arraySet
     */
    public function redirectIfNotLoged($viewName, $arraySet = array(), $getUser = true)
    {
        $userClass = new User();
        $connected = User::is_connected();
        $message = new Message();
        $messages = $message->getMessages();
        if ($connected === true) {
            $view = new View($viewName);
            if (!empty($arraySet)) {
                foreach ($arraySet as $name => $value) {
                    $view->set($name, $value);
                }
            }
            if ($getUser === true) {
                $user = $userClass->getUser();
                if ($user !== false) {
                    foreach ($user as $name => $value) {
                        $view->set($name, $value);
                    }
                }
            }
            $view->render();
        } else {
            $view = new View("admin#login");
            $view->set("error", $messages["error"]["mustBeConnected"]);
            $view->render();
        }
    }

    public function logout()
    {
        $user = new User();
        $logout = $user->logout($_POST["token"]);
        if ($logout) {
            sleep(1);
            echo "true";
        } else {
            echo "false";
        }
    }

}