<?php
  $login=$_POST['login'];
  $password=$_POST['password'];
  $password_repeat=$_POST['password_repeat'];
  $email=$_POST['email'];
  $name=$_POST['name'];
  $xml =simplexml_load_file('users.xml');
  $dbpasswords = $xml->User;
  foreach($dbpasswords as $row){
    if ($row->login==$login ){
      die('Такой пользователь уже существует');
    }
  }
  function mdSolt($pass){
    $md = md5($pass);
    $salt = 'HelloWorld';
    $md = md5($md . $salt);
    return $md;
  }
  class CRUD {
    public function create($login,$password, $password_repeat,$email,$name) {
      $xml = simplexml_load_file('users.xml'); 
      $user_xml = $xml->addChild('User');
      $user_xml->addChild('login', $login);
      $user_xml->addChild('password', $password);
      $user_xml->addChild('password_repeat', $password_repeat);
      $user_xml->addChild('email', $email);
      $user_xml->addChild('name', $name);
      $xml->asXML('users.xml');

    }
    public function retreive() {

    }
    public function update() {

    }
    public function delete() {

    }
  
  }
  $A =new CRUD();
     if ($password===$password_repeat){
     if (strlen($login)>=6 && preg_match('/^[a-z0-9]+$/i',$login)){
       if (preg_match("/^[a-z][0-9]/i",$password)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
          if (preg_match('/^[a-z0-9]+$/i',$name)){
            echo 'Ващ аккаунт успешно создан1488';
            $A->create($login,mdSolt($password),mdSolt($password_repeat),$email,$name);
          }
          else {
            die ('Введите имя на английском');
          }
        } 


     }
       else{ echo 'PASSПароль должен содержать цифру, буквы в разных регистрах и спец символ';

        }}
     else {
      die('Логин содержит запрещенные символы или слишком короткий (меньше 6 символов)');
     }
    }
   else{
    die('PAASПароли не совпадают');
 }
?>