<?php
    class Cuisine
    {

      private $description;

      function __construct($description)
      {
        $this->description = $description;
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
      }
      static function getAll()
      {
        $returned_cuisines = $GLOBALS['DB']->query("SELECT * FROM cuisine");
        $cuisines = array();
        foreach($returned_cuisines as $cuisine)
        {
            $description = $cuisine['description'];
            $new_cuisine = new Cuisine($description);
            array_push($cuisines, $new_cuisine);
        }
        return $cuisines;
      }


    }

 ?>
