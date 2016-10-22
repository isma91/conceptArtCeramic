<?php
namespace model;
/**
 * Class SiteInfo
 * @package model
 */
class SiteInfo
{
    /**
     * @var
     */
    private $_title = "";
    /**
     * @var
     */
    private $_description = "";
    /**
     * @var array
     */
    private $_categories = array();
    /**
     * @var array
     */
    private $_colors = array();
    /**
     * @var array
     */
    private $_materials = array();
    /**
     * @var array
     */
    private $_sizes = array();
    /**
     * @var array
     */
    private $_usages = array();

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->_categories;
    }

    /**
     * @return array
     */
    public function getColors()
    {
        return $this->_colors;
    }

    /**
     * @return array
     */
    public function getMaterials()
    {
        return $this->_materials;
    }

    /**
     * @return array
     */
    public function getSizes()
    {
        return $this->_sizes;
    }

    /**
     * @return array
     */
    public function getUsages()
    {
        return $this->_usages;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $bdd = new Bdd();
        $lan = $_SESSION["lang"] . "Content";
        $updateTitle = $bdd->update("site", array($lan => $title), "field = 'title'");
        if ($updateTitle) {
            $this->_title = $title;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $bdd = new Bdd();
        $lan = $_SESSION["lang"] . "Content";
        $updateDescription = $bdd->update("site", array($lan => $description), "field = 'description'");
        if ($updateDescription) {
            $this->_description = $description;
            return true;
        } else {
            return false;
        }
    }

    /**
     * SiteInfo constructor.
     */
    public function __construct()
    {
        $bdd = new Bdd();
        $lan = $_SESSION["lang"] . "Content";
        $site = $bdd->select("site", array("field", $lan), "field = 'title' OR field = 'description'");
        if (!empty($site)) {
            foreach ($site as $array) {
                $field = "_" . $array["field"];
                $this->$field = $array[$lan];
            }
        }
        $selectCategories = $bdd->select("category", array("*"));
        if (!empty($selectCategories)) {
            foreach ($selectCategories as $array) {
                $this->_categories[$array["id"]] = stripslashes($array[$_SESSION["lang"] . "Name"]);
            }
        }
        $selectMaterials = $bdd->select("material", array("*"));
        if (!empty($selectMaterials)) {
            foreach ($selectMaterials as $array) {
                $this->_materials[$array["id"]] = stripslashes($array[$_SESSION["lang"] . "Name"]);
            }
        }
        $selectSizes = $bdd->select("sizes", array("*"));
        if (!empty($selectSizes)) {
            foreach ($selectSizes as $array) {
                $this->_categories[$array["id"]] = stripslashes($array["name"]);
            }
        }
        $selectUsages = $bdd->select("usage", array("*"));
        if (!empty($selectUsages)) {
            foreach ($selectUsages as $array) {
                $this->_materials[$array["id"]] = stripslashes($array[$_SESSION["lang"] . "Name"]);
            }
        }
    }

    public function checkDuplicate($type, $value)
    {
        $duplicate = false;
        $arrayField = array(
            "category" => "_categories",
            "material" => "_materials",
            "size" => "_sizes",
            "usage" => "_usages"
        );
        if (isset($arrayField[$type])) {
            $field = $arrayField[$type];
            foreach ($this->$field as $fieldValue) {
                if ($fieldValue == $value) {
                    $duplicate = true;
                    break;
                }
            }
        }
        return $duplicate;
    }

    public function add($type, $arrayValue)
    {
        $bdd = new Bdd();
        if ($type === "size") {
            if (!$this->checkDuplicate("size", $arrayValue["width"] . "x" . $arrayValue["height"])) {
                $arrayField = array("name" => $arrayValue["width"] . "x" . $arrayValue["height"]);
                $add = $bdd->insert($type, $arrayField);
                if ($add) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            if (!$this->checkDuplicate($type, $arrayValue[$_SESSION["lang"]])) {
                $arrayField = array("frName" => addslashes($arrayValue["fr"]), "enName" => addslashes($arrayValue["en"]));
                $add = $bdd->insert($type, $arrayField);
                if ($add) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function update($type, $arrayValue)
    {
        $bdd = new Bdd();
        if ($type === "size") {
            if (!$this->checkDuplicate("size", $arrayValue[$_SESSION["lang"]])) {
                $update = $bdd->update($type, array("name" => $arrayValue[$_SESSION["lang"]]), "id = " . $arrayValue["id"]);
                if ($update) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            if (!$this->checkDuplicate("size", $arrayValue[$_SESSION["lang"]])) {
                $field = $_SESSION["lang"] . "Name";
                $update = $bdd->update($type, array($field => $arrayValue[$_SESSION["lang"]]), "id = " . $arrayValue["id"]);
                if ($update) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
}