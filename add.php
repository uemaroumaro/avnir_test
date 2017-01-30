<?php
  // DB接続
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Insert
//$bulk = new MongoDB\Driver\BulkWrite;
//$bulk->insert(['name' => '上田', 'address' => '埼玉県さいたま市見沼区','occupation'=>'学生','age'=>'23']);
//$manager->executeBulkWrite('avenir_ueda.t_user', $bulk);

$name = $_GET['name'];
$address = $_GET['address'];
$occupation = $_GET['occupation'];
$age = $_GET['age'];
// Insert
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['name' => $name, 'address' => $address,'occupation'=>$occupation,'age'=>$age]);
$manager->executeBulkWrite('avenir_ueda.t_user', $bulk);
$url = 'mongotest.php';
header("Location: {$url}");
exit;
echo $comment;

?>