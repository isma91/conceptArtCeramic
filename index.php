<?php
/**
 * Index.php
 *
 * Display view with the Router model
 *
 * PHP 7.0.8
 *
 * @category Controller
 * @author   isma91 <ismaydogmus@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 */
session_start();
/*
 * If there is no selected language, we choose the fr
 */
//$_SESSION["lang"] = "fr";
if (!isset($_SESSION["lang"])) {
    $_SESSION["lang"] = "fr";
}
require 'autoload.php';
$router = new \routing\Router($_GET["url"]);
/*
 * Here are all the using routes
 */
/*
 * Home page
 */
$router->get("", "Site#index");
$router->get("/", "Site#index");
/*
 * Admin login
 */
$router->get("admin", "User#adminLogin");
$router->post("admin", "User#login");
/*
 * Admin home page
 */
$router->get("admin/panel", "User#adminPanel");
/*
 * Add another admin
 */
$router->get("admin/register", "User#adminRegister");
$router->post("admin/register", "User#add");
/*
 * Switch language POST request
 */
$router->post("switchLanguage", "Site#switchLanguage");
/*
 * Logout POST request
 */
$router->post("logout", "User#logout");
/*
 * Add Something
 */
$router->get("admin/add/:type", "User#thing");
$router->post("admin/add/:type", "User#addThing");
/*
 * Display all Thing in Admin
 */
$router->get("/admin/update/:type", "User#thingPage");
/*
 * Display a Thing to update
 */
$router->get("/admin/update/:type/:id", "User#displayThing");
$router->post("/admin/update/:type/:id", "User#updateThing");
/*
 * Display all Categories
 */
$router->get("/products", "Site#categories");
/*
 * Display all Materials  of a Category
 */
$router->get("/products/:category", "Site#materials");
/*
 * Display all Product  of a Material
 */
$router->get("/products/:category/:material", "Site#products");
/*
 * Display a Product
 */
$router->get("/product/:id", "Site#product");
/*
 * Send Estimate for a product
 */
$router->post("/product/:id", "Site#sendDevis");
/*
 * Display the Cini Page
 */
$router->get("/cini", "Site#cini");
/*
 * Display the Contact Page
 */
$router->get("/contact", "Site#contact");
$router->post("/contact", "Site#sendMessage");
/*
 * Run the routing System
 */
$router->run();