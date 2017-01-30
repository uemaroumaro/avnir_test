<?php
  // DB接続
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Insert
//$bulk = new MongoDB\Driver\BulkWrite;
//$bulk->insert(['name' => '上田', 'address' => '埼玉県さいたま市見沼区','occupation'=>'学生','age'=>'23']);
//$manager->executeBulkWrite('avenir_ueda.t_user', $bulk);

// Select
//$filter = ['address' => ['$gt' => 'tokyo']]; // where句
$filter = [];
$options = [
	    'projection' => ['_id' => 0],
	    'sort' => ['_id' => -1],
	    ];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('avenir_ueda.t_user', $query);


echo("<html lang=\"ja\">
    <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Sample</title>
    <!-- BootstrapのCSS読み込み -->
    <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">
    <!-- jQuery読み込み -->
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
    <!-- BootstrapのJS読み込み -->
    <script src=\"js/bootstrap.min.js\"></script>
  </head>");
// Select 結果表示
echo("<body><div><h1>t_userの内容</h1>");
echo("<table class=\"table table-striped table-hover\"><thead><tr><th class=\"col-md-2\">名前</th><th>住所</th><th>職業</th><th>年齢</th></tr></thead><tbody>");
foreach ($cursor as $document) {
 echo("<tr><th>".$document->name."</th><th>".$document->address."</th><th>".$document->occupation."</th><th>".$document->age."</th></tr>");
}
echo("</tbody></table>");
echo("</div>
    <h1>カラム登録</h1>
    <form action=\"add.php\">
        <input type=\"text\" name=\"name\" placeholder=\"名前を入力\">
        <input type=\"text\" name=\"address\" placeholder=\"住所を入力\">
        <input type=\"text\" name=\"occupation\" placeholder=\"職業を入力\">
        <input type=\"text\" name=\"age\" placeholder=\"年齢を入力\">
        <input type=\"submit\" values=\"送信\">
        </form>");
?>