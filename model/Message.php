<?php
namespace model;
/**
 * Class Message
 * @package model
 */
/**
 * Class Message
 * @package model
 */
class Message
{
    /**
     * @var array
     */
    public $messages = array();

    /**
     * @return array
     */
    public function getMessages()
    {
        $config = new Config();
        return $this->messages[$_SESSION["lang"]];
    }

    /**
     * Message constructor.
     */
    public function __construct()
    {
        $errorFrMessage = array(
            "duplicateEmail" => "Cet email est déjà pris.",
            "emptyField" => "Certains champs ne sont pas remplis.",
            "wrongCredential" => "Mauvais Pseudo/Email ou Mot de Passe.",
            "mustBeConnected" => "Vous devez être connecter pour aller sur cette page.",
            "mustNotBeConnected" => "Vous ne devez pas être connecter pour aller sur cette page.",
            "updateInfoSite" => "Un problème est survenue lors de la mise à jour du titre et de la description du site.",
            "addCategory" => "Un problème est survenue lors de l'ajout d'un nouvel Catégorie.",
            "addColor" => "Un problème est survenue lors de l'ajout d'une nouvelle Couleur.",
            "addMaterial" => "Un problème est survenue lors de l'ajout d'un nouveau Materiau.",
            "addSize" => "Un problème est survenue lors de l'ajout d'une nouvelle Taille.",
            "addUsage" => "Un problème est survenue lors de l'ajout d'une nouvelle Utilisation.",
            "updateCategory" => "Un problème est survenue lors de la modification de la Catégorie.",
            "updateColor" => "Un problème est survenue lors de la modification de la Couleur.",
            "updateMaterial" => "Un problème est survenue lors de la modification du Materiau.",
            "updateSize" => "Un problème est survenue lors de la modification de la Taille.",
            "updateUsage" => "Un problème est survenue lors de la modification de l'Utilisation.",
            "duplicateCategory" => "Catégorie %s déjà enregistrer.",
            "duplicateColor" => "Couleur %s déjà enregistrer.",
            "duplicateMaterial" => "Materiau %s déjà enregistrer.",
            "duplicateSize" => "Taille %s déjà enregistrer.",
            "duplicateUsage" => "Utilisation %s déjà enregistrer.",
            "uploadImg" => "Error lors du téléchargement de l'image %s.",
            "createFolder" => "Error lors de la création d'un dossier.",
            "moveImg" => "Error lors de l'ajout de l'image %s.",
            "addProduct" => "Error lors de l'ajout du Produit %s.",
        );
        $successFrMessage = array(
            "adminCreated" => "Vous avez ajouté l'admin %s avec succès.",
            "updateInfoSite" => "Les informations du site a été changer ave succès.",
            "addCategory" => "Catégorie %s ajouté avec succès.",
            "addColor" => "Couleur %s ajouté avec succès.",
            "addMaterial" => "Materiau %s ajouté avec succès.",
            "addSize" => "Taille %s ajouté avec succès.",
            "addUsage" => "Utilisation %s ajouté avec succès.",
            "updateCategory" => "Catégorie %s modifier avec succès.",
            "updateColor" => "Couleur %s modifier avec succès.",
            "updateMaterial" => "Materiau %s modifier avec succès.",
            "updateSize" => "Taille %s modifier avec succès.",
            "updateUsage" => "Utilisation %s modifier avec succès.",
            "addProduct" => "Produit %s ajouter avec succès.",
        );
        $infoFrMessage = array(
            "maintenance" => "Le site affiche qu'il est en maintenance."
        );
        $errorEnMessage = array(
            "duplicateEmail" => "This email is already taken.",
            "emptyField" => "Some field are not complete.",
            "wrongCredential" => "Bad Nickname/Email or Password.",
            "mustBeConnected" => "You must be loged to visit this page.",
            "mustNotBeConnected" => "You must not be loged to visit this page.",
            "updateInfoSite" => "Un problème est survenue lors de la mise à jour du titre et de la description du site.",
            "addCategory" => "Un problème est survenue lors de l'ajout d'un nouvel Catégorie.",
            "addColor" => "Un problème est survenue lors de l'ajout d'une nouvelle Couleur.",
            "addMaterial" => "Un problème est survenue lors de l'ajout d'un nouveau Materiau.",
            "addSize" => "Un problème est survenue lors de l'ajout d'une nouvelle Taille.",
            "addUsage" => "Un problème est survenue lors de l'ajout d'une nouvelle Utilisation.",
            "updateCategory" => "Un problème est survenue lors de la modification de la Catégorie.",
            "updateColor" => "Un problème est survenue lors de la modification de la Couleur.",
            "updateMaterial" => "Un problème est survenue lors de la modification du Materiau.",
            "updateSize" => "Un problème est survenue lors de la modification de la Taille.",
            "updateUsage" => "Un problème est survenue lors de la modification de l'Utilisation.",
            "duplicateCategory" => "Catégorie %s déjà enregistrer.",
            "duplicateColor" => "Couleur %s déjà enregistrer.",
            "duplicateMaterial" => "Materiau %s déjà enregistrer.",
            "duplicateSize" => "Taille %s déjà enregistrer.",
            "duplicateUsage" => "Utilisation %s déjà enregistrer.",
            "uploadImg" => "Error lors du téléchargement de l'image %s.",
            "createFolder" => "Error lors de la création d'un dossier.",
            "moveImg" => "Error lors de l'ajout de l'image %s.",
            "addProduct" => "Error lors de l'ajout du Produit %s.",
        );
        $successEnMessage = array(
            "adminCreated" => "Vous avez ajouté l'admin %s avec succès.",
            "updateInfoSite" => "Les informations du site a été changer ave succès.",
            "addCategory" => "Catégorie %s ajouté avec succès.",
            "addColor" => "Couleur %s ajouté avec succès.",
            "addMaterial" => "Materiau %s ajouté avec succès.",
            "addSize" => "Taille %s ajouté avec succès.",
            "addUsage" => "Utilisation %s ajouté avec succès.",
            "updateCategory" => "Catégorie %s modifier avec succès.",
            "updateColor" => "Couleur %s modifier avec succès.",
            "updateMaterial" => "Materiau %s modifier avec succès.",
            "updateSize" => "Taille %s modifier avec succès.",
            "updateUsage" => "Utilisation %s modifier avec succès.",
            "addProduct" => "Produit %s ajouter avec succès.",
        );
        $infoEnMessage = array(
            "maintenance" => "Le site affiche qu'il est en maintenance."
        );
        $frMessage = array("error" => $errorFrMessage, "success" => $successFrMessage, "info" => $infoFrMessage);
        $enMessage = array("error" => $errorEnMessage, "success" => $successEnMessage, "info" => $infoEnMessage);
        $this->messages = array( "fr" => $frMessage, "en" => $enMessage);
    }
}