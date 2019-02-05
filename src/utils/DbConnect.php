<?php
namespace App\utils;
use PDO;
use PDOException;
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
            $this->logger = new DB_Logger("db");
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
    try {
      if( !$this->conn->prepare($sql) ){
        throw new \Exception(1,"Error Processing Request");
      }
      $this->query = $this->conn->prepare($sql);
      $this->query->execute();
      $results = $this->query->fetchAll(PDO::FETCH_ASSOC);
      // $this->logger->log(01, json_encode($results));
      return $results;
    }
    catch (PDOException $e){
      $this->logger->log($e->getCode() , $e->getMessage());
    }
    catch (\Exception $e) {
      $this->logger->log($e->getCode() , $e->getMessage());
    }
  }
  //example $table-> name of the table string format
  //$whereprase-> associative array array("id"=>1, "user_name"=>"krishna");
  //$selectors-> string -> user_id,user_name
  public function selectBy($table, $wherePhrase = NULL, $selectors = '*')
  {
      try {
        $where = $this->prepareNamedParams($wherePhrase);
        if($where)
        {
            $sql = 'SELECT ' . $selectors . ' FROM ' . $table . ' WHERE ' . $where;
            if( !$this->conn->prepare($sql) ){
              throw new PDOException(1,"Error Processing Request");
            }
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
      } catch (PDOException $e) {
        $this->logger->log($e->getCode() , $e->getMessage());
        return array("status" => "Invalid Data");
      }
  }
//insert function -> tableName, array of column names,
  public function insert($table, array $columns, array $values)
  {
    try {
      $column = '(' . implode(',', $columns) . ')';
      $params = $this->prepareValues($values);
      $sql = ('INSERT INTO ' . $table . ' ' . $column . ' VALUES ' . $params);

      if( !$this->conn->prepare($sql) ){
        throw new PDOException(1,"Error Processing Request");
      }
      $this->query = $this->conn->prepare($sql);
      foreach($values as $param => $value)
      {
          $this->prepareBind($param,$value);
      }
      $this->query->execute();
      return array("status" => "Data is inserted");
    } catch (PDOException $e) {
      $this->logger->log($e->getCode(), $e->getMessage());
      return array("status" => "Invalid Data",
                    "querry" => $sql);
    }
  }
//updte query
//setting and the consition
  public function update($table, array $values, array $parameters)
  {
      try {
        $params = $this->prepareUpdateParams($values);
        $where = $this->prepareNamedParams($parameters);
        $sql = ("UPDATE " . $table . " SET " . $params . " WHERE " . $where);

        if( !$this->conn->prepare($sql) )
        {
          throw new PDOException(1, "Error Processing Request");
        }
        $this->query = $this->conn->prepare($sql);
        foreach($parameters as $param => $value)
        {
            $this->prepareBind($param,$value);
        }
        foreach($values as $param => $value)
        {
            $this->prepareBind($param,$value);
        }
        var_dump($this->query->execute());
        die();
      } catch (PDOException $e) {
        $this->logger->log( $e->getCode(), $e->getMessage() );
      }
  }

  protected function prepareUpdateParams($wherePhrase)
  {
    try {
      if(empty($wherePhrase))
      {
          return false;
      }
      $params = array();
      foreach($wherePhrase as $name => $value)
      {
          $params[] = $name . ' = :' . $name;
      }
      return implode(' , ',$params);  //needed to change to and
    } catch (\Exception $e) {
      $this->logger->log( $e->getCode(), $e->getMessage() );
    }
  }


  protected function prepareNamedParams($wherePhrase)
  {
    try {
      if(empty($wherePhrase))
      {
          return false;
      }
      $params = array();
      foreach($wherePhrase as $name => $value)
      {
          $params[] = $name . ' = :' . $name;
      }
      return implode(' AND ',$params);  //needed to change to and
    } catch (\Exception $e) {
      $this->logger->log( $e->getCode(), $e->getMessage() );
    }
  }
  protected function prepareBind($param, $value, $type = null)
  {
    try {
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
    } catch (\Exception $e) {
      $this->logger->log( $e->getCode(), $e->getMessage() );
    }
  }
//used in the insert command for the sql
  protected function prepareValues($values)
  {
    try {
      $params = array();
      foreach($values as $key => $value)
      {
          $params[] = ':' . $key;
      }
      return '(' . implode(',',$params) . ')';
    } catch (\Exception $e) {
      $this->logger->log( $e->getCode(), $e->getMessage() );
    }
  }
}
?>
