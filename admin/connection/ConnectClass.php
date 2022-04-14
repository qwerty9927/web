<?php
  class Connect_Driver{
    public $conn;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "cuahang";
    function connect(){
      $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db);
    }

    function select($sql){
      $arr = array();
      $result = mysqli_query($this->conn, $sql);
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        array_push($arr, $row);
      }
      return $arr;
    }

    function insert($table, $data){
      $arr_key = "";
      $arr_value = "";
      foreach($data as $key=>$value){
        $arr_key .= $key . ",";
        $arr_value .= "'".$value."'" . ",";
      }
      $sql = "INSERT INTO {$table} (".rtrim($arr_key, ',').") VALUES (".rtrim($arr_value, ',').")";
      if(mysqli_query($this->conn, $sql)){
        return true;
      } else {
        return false;
      }
    }

    function update($table, $data, $where){
      $string = "";
      foreach($data as $key=>$value){
        $string .= "$key = '{$value}'".",";
      }
      $sql = "UPDATE $table
        SET ".rtrim($string, ",")." WHERE $where";
      if(mysqli_query($this->conn, $sql)){
        return true;
      } else {
        return false;
      }
    }

    function delete($table, $where){
      $sql = "DELETE FROM $table WHERE $where";
      if(mysqli_query($this->conn, $sql)){
        return true;
      } else {
        return false;
      }
    }

    function dis_connect(){
      if($this->conn){
        mysqli_close($this->conn);
      }
      // echo "Close Connnect";
    }
  }
?>