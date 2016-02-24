<?php
    class Cuisine
    {

      private $description;
      private $id;

      function __construct($description, $id = null)
      {
        $this->description = $description;
        $this->id = $id;
      }
      function getId()
      {
        return $this->id;
      }
      function setDescription($new_description)
      {
        $this->description = (string) $new_description;
      }
      function getDescription()
      {
        return $this->description;
      }
      function save()
      {
        $GLOBALS['DB']->exec("INSERT INTO cuisine (description) VALUES ('{$this->getDescription()}');");
        $this->id = $GLOBALS['DB']->lastInsertId();
      }
      static function getAll()
      {
        $returned_cuisines = $GLOBALS['DB']->query("SELECT * FROM cuisine;");
        $cuisines = array();
        foreach($returned_cuisines as $cuisine)
        {
            $description = $cuisine['description'];
            $id = $cuisine['id'];
            $new_cuisine = new Cuisine($description, $id);
            array_push($cuisines, $new_cuisine);
        }
        return $cuisines;
      }
      static function deleteAll()
      {
        $GLOBALS['DB']->exec("DELETE FROM cuisine;");
      }



    }

 ?>
