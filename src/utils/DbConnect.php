<?php

namespace App\utils;
use PDO;
use PDOException;
use App\utils\DB_Logger;
class DbConnect
{

  private $conn = null;
  private $query;
  protected $logger;

  public function __construct()
  {
    try{
      if($this->conn==null) {
            $config = parse_ini_file(__DIR__ . '/config.ini');
            $options = [PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                             PDO::ATTR_EMULATE_PREPARES   => true];

            $dsn = $config['driver'] . ":host=".$config['server_name'].";dbname=".$config['db_name'];
            $this->conn = new PDO( $dsn, $config['user'], $config['pass'], $options);
            $this->logger = new DB_Logger();
      }
      } catch(PDOException $e) {
        $this->logger->log($e->getCode() , $e->getMessage());
      }
 }

  public function  disConnect() {
        $this->conn = null;
  }

  public function getConnect() {
        return $this->conn;
  }

  public function hardCodeSelect($sql)
  {
    $this->query = $this->conn->prepare($sql);
    $this->query->execute();
    $results = $this->query->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  }

  //example $table-> name of the table string format
  //$whereprase-> associative array array("id"=>1, "user_name"=>"krishna");
  //$selectors-> string -> user_id,user_name
  public function selectBy($table, $wherePhrase = NULL, $selectors = '*')
  {
      $where = $this->prepareNamedParams($wherePhrase);
      if($where)
      {
          $sql = 'SELECT ' . $selectors . ' FROM ' . $table . ' WHERE ' . $where;
          $this->query = $this->conn->prepare($sql);

          foreach($wherePhrase as $param => $value)
          {
              $this->prepareBind($param,$value);
          }

      }
      else
      {
          $sql = ('SELECT ' . $selectors . ' FROM ' . $table );

          $this->query = $this->conn->prepare($sql);
      }
      // echo $sql;
      $this->query->execute();
      $results = $this->query->fetchAll(PDO::FETCH_ASSOC);
      return $results;
  }


//insert function -> tableName, array of column names,
  public function insert($table, array $columns, array $values)
  {
    $column = '(' . implode(',', $columns) . ')';
    $params = $this->prepareValues($values);
    $sql = ('INSERT INTO ' . $table . ' ' . $column . ' VALUES ' . $params);
    // echo $sql;
    // die();

    $this->query = $this->conn->prepare($sql);

    foreach($values as $param => $value)
    {
        $this->prepareBind($param,$value);
    }

    $this->query->execute();
  }

//updte query

  public function update($table, array $values, array $parameters)
  {
      $params = $this->prepareNamedParams($values);
      $where = $this->prepareNamedParams($parameters);

      $sql = ("UPDATE " . $table . " SET " . $params . " WHERE " . $where);

      $this->query = $this->conn->prepare($sql);

      foreach($parameters as $param => $value)
      {
          $this->prepareBind($param,$value);
      }

      foreach($values as $param => $value)
      {
          $this->prepareBind($param,$value);
      }

      $this->query->execute();
  }


  protected function prepareNamedParams($wherePhrase)
  {
    if(empty($wherePhrase))
    {
        return false;
    }

    $params = array();
    foreach($wherePhrase as $name => $value)
    {
        $params[] = $name . ' = :' . $name;
    }
    return implode(' AND ',$params);
  }


  protected function prepareBind($param, $value, $type = null)
  {
    if (is_null($type)) {
        switch (true) {
            case is_int($value):
                $type = \PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = \PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = \PDO::PARAM_NULL;
                break;
            default:
                $type = \PDO::PARAM_STR;
        }
    }
    $this->query->bindValue($param, $value, $type);
  }

  protected function prepareValues($values)
  {
    $params = array();
    foreach($values as $key => $value)
    {
        $params[] = ':' . $key;
    }
    return '(' . implode(',',$params) . ')';
  }

}

?>
