<?php
  date_default_timezone_set('America/Los_Angeles');
  require_once __DIR__."/../vendor/autoload.php";
  require_once __DIR__.'/../src/address-book.php';

  session_start();
   if (empty($_SESSION['list_of_contacts'])){
       $_SESSION['list_of_contacts'] = array();
   }

  $app= new Silex\Application();
  $app['debug']= true;
  $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__."/../views"
      ));
  $app->get('/', function() use($app){
    return $app['twig']->render('contact.html.twig', array('list_of_contacts' => contact::getAll()));
  });
  $app->post('/create_contact', function() use ($app){
    $contact= new contact($_POST['name'],$_POST['address'],$_POST['phone']);
    $contact->save();
    return $app['twig']->render('create_contact.html.twig', array('new_contact'=>$contact));
  });
  $app->post('/delete_contacts', function() use($app){
    contact::delete();
    return $app['twig']->render('delete_contacts.html.twig');
  });
  $app->post('/remove_contact', function() use ($app){
    contact::remove();
    return $app['twig']->render('remove_contact.html.twig');
  });
  return $app;

 ?>
