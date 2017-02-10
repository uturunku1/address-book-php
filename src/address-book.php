<?php


class contact
{
  private $name;
  private $address;
  private $phone;
  function __construct($name, $address,$phone)
  {
    $this->name= $name;
    $this->address= $address;
    $this->phone= $phone;
  }
  function setName($new_name){
    $this->name= (string) $new_name;
  }
  function getName(){
    return $this->name;
  }
  function getAddress(){
    return $this->address;
  }
  function getPhone(){
    return $this->phone;
  }
  function save()
  {
    array_push($_SESSION['list_of_contacts'], $this);
  }
  static function getAll()
  {
    return $_SESSION['list_of_contacts'];
  }
  static function delete()
  {
    $_SESSION['list_of_contacts'] = array();
  }
  // function setAdress()
  // {
  //   # code...
  // }

}
 ?>
