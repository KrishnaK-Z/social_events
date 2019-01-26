<?php

$container['db'] = function ($container) {
  try{
    $dbh = $container->get('settings')['db'];
    $dsn = $dbh['driver'] . ":host=" . $dbh['server_name'] . ";dbname=" . $dbh['db_name'];
    $user = $dbh['user'];
    $pass = $dbh['pass'];
    $pdo = new PDO($dsn, $user, $pass, $dbh['options']);
    return $pdo;
  }
  catch(PDOException $e)
  {
    $this->logger->log($e->getCode(), $e->getMessage());
  }
};

 ?>
