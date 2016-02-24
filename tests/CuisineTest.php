<?php

  /**
  * @backupGlobals disabled
  * @bkacupStaticAttributes disabled
  */

  require_once "src/Cuisine.php";

  $server = 'mysql:host=localhost;dbname=food_test';
  $username = 'root';
  $password = 'root';
  $DB = new PDO($server, $username, $password);

  class CuisineTest extends PHPUnit_Framework_TestCase
  {
        function test_save()
        {
          //Arrange
          $description = "Vietnamese";
          $test_cuisine = new Cuisine($description);
          //Act
          $test_cuisine->save();
          //Assert
          $result = Cuisine::getAll();
          $this->assertEquals($test_cuisine, $result[0]);
        }
  }


?>
