<?php
  // DB接続
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Insert
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['name' => '山田', 'address' => '東京']);
$manager->executeBulkWrite('test_db.test', $bulk);

// Select
//$filter = ['address' => ['$gt' => 'tokyo']]; // where句
$filter = [];
$options = [
	    'projection' => ['_id' => 0],
	    'sort' => ['_id' => -1],
	    ];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('test_db.test', $query);

// Select 結果表示
foreach ($cursor as $document) {
  var_dump($document);
}
?>