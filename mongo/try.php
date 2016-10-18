<?php
$connection = new MongoClient ("mongodb://localhost:27017"); //链接到 192.168.1.5:27017//27017端口是默认的
$db = $connection->mydb;
$document = array( 
      "title" => "MongoDB", 
      "description" => "database", 
      "likes" => 100,
      "url" => "http://www.w3cschool.cc/mongodb/",
      "by", "w3cschool.cc"
   );
$info = $db->mycol;
//$info->update(array("title"=>"MongoDB"),array('$set'=>array("title"=>"gangga")));
//$info->insert($document);
//$info->remove(array('title'=>'gangga'));
$cursor = $info->find();
foreach ($cursor as $value) {
	var_dump($value);
}

