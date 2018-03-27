<?php
// connect to our mysql database server

  $connParts = parse_url($url);
  $connUrl = getenv('JAWSDB_MARIA_URL');
  $hasConnUrl = !empty($connUrl);
  
  $connParts = null;
  if ($hasConnUrl) {
      $connParts = parse_url($connUrl);
  }
  
  //var_dump($hasConnUrl);
  $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
  $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'dBName';//change dBName to real one later
  $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
  $password = $hasConnUrl ? $connParts['pass'] : '';
  
  $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>