<?php
include "../app/models/Database.php";

$obj = new Database();
//$obj->insert("crud", ['name' => 'farsad', 'email' => 'farsad@gmail.com', 'mobile' => '12345', 'password' => 'pass']);
$obj->delete("crud", "id='3'");
echo "<br/> Delete result is: ";
print_r($obj->getResult());