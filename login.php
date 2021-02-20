<?php
 $login=$_POST['login'];
 $password=$_POST['password'];
 $xml =simplexml_load_file('users.xml');
 $db = $xml->User;
 function mdSolt($pass){
  $md = md5($pass);
  $salt = 'HelloWorld';
  $md = md5($md . $salt);
  return $md;
}
 foreach($db as $row){
   if ($row->login==$login && $row->password == mdSolt($password); ){
    require_once('main.html');
    $text='Привет '+$login;
    header ('Location: ...\Application_Regsiter\main.html');
   }
 }
?>