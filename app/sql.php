
<?php

$dsn = 'pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try {
    //DBに接続する
    $dbh = new PDO($dsn,$user,$pass);

    //ここでクエリを実行する
    //queryメソッド
    $query_result = $dbh->query('SELECT * FROM test_comments');
    $sth = $dbh->prepare('INSERT INTO test_comments (name,text) VALUES (?,?)');//prepareメソッドで後から??に変数を入れる
    $sth_select = $dbh->prepare('SELECT * FROM test_comments WHERE name = ?');//test_commentsテーブルからnameを取得するSQL

    //DBを切断する
    $dbh = null;
}
catch(PDOException $e){
    //接続にエラーが発生した場合にここに入る
    print "DB  ERROR: " .$e->getMessage() . "<br/>";
    die();
}
?>

<?php
foreach($query_result as $row) {//$query_resultを$rowに詰める
    print $row["name"] . ":" .$row["text"] . "<br/>";//$rowのnameと$rowのtextを表示
}
?>

<?php

$name = 'John';//$nameにJohnという文字列を代入
$text = 'Power to the People';//$textにPower to the Peopleという文字列を代入
$sth->execute(array($name,$text));//実行
?>

<?php
  $name = "John";
  $sth_select->execute(array($name));
  $prepare_result = $sth_select->fetchAll();
  foreach($prepare_result as $row) {
    print $row["name"] . ": " . $row["text"] . "<br/>";
  }
  $sth_select->execute(array($name));
?>