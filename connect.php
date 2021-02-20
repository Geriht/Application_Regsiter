<?PHP
$str_xml = simplexml_load_file('users.xml');

print_r($str_xml->user->login);
?>