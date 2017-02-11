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
  function setAddress($new_address){
    $this->name= (string) $new_address;
  }
  function setPhone($new_phone){
    $this->name= (string) $new_phone;
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
  static function remove()
  {
    echo $_POST['key'];
    $key = $_POST['key'];
    // echo count ($_SESSION['list_of_contacts']);
    // $key= array_search($_POST['key'],$_SESSION['list_of_contacts']);
    unset($_SESSION['list_of_contacts'][$key]);
    $_SESSION['list_of_contacts']=array_values($_SESSION['list_of_contacts']);
  }
}
 ?>
