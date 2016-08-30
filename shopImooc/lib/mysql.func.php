<?php
require_once '../include.php';
header("Content-type:text/html;charset=utf-8");

/**
 * @author hufangqin
 *
 */
class Mysqli_Database {
    public  function __construct($host = DB_HOST, $user = DB_USER, $pwd = DB_PWD, $dbname = DB_DBNAME){
        $this->connection = $this->connect($host, $user, $pwd, $dbname, true);
    }
    
    private function  connect($host = DB_HOST, $user = DB_USER, $pwd = DB_PWD, $dbname = DB_DBNAME,$persistant = true){
        $host = $persistant === true ? 'p:'.$host : $host;
        $mysqli = new mysqli($host, $user, $pwd, $dbname);
        if($mysqli->connect_error) {
            throw new Exception('Connection Error: '.$mysqli->connect_error);
        }
            return $mysqli;
    }
    
    
    function insert($table,$array) {
        
        $keys = join(",", array_keys($array));
        
        $vals = "'".join("','",  array_values($array))."'";
        
        $sql = "insert {$table} ($keys) value ({$vals})";
        
        if(is_object($this->connection)){
            $this->connection->query ($sql);
            return  mysqli_insert_id($this->connection);
        }
    }
    /**
     * @param unknown $table
     * @param unknown $array
     * @param unknown $where
     */
    function update($table,$array,$where = null) {
        $str = "";
        foreach ($array as $key=>$val) {
            if ($str == null){
                $sep="";
            } 
            else {
                $sep=",";
            }
            $str.=$sep.$key."='".$val."'";
        }
        $sql="update {$table} set {$str}".($where==null?null:" where ".$where);
        $this->connection->query($sql);
        return mysqli_affected_rows($this->connection);
    }
    
    /**
     * delete
     * @param unknown $table
     * @param unknown $where
     */
    function  delete($table,$where=null) {        
        $where = $where==null?null:" where ".$where;
        $sql="delete from {$table} {$where}";
        $result = $this->connection->query($sql);
        return  mysqli_affected_rows($this->connection);
    }
    
    /**
     * @param unknown $sql
     * @param string $result_type
     * @return unknown
     */
    function fetchOne($sql){
        $result = $this->connection->query($sql);        
        $row=mysqli_fetch_array($result);
        return $row;
    }
    
    function fetchAll($sql){
        $result = $this->connection->query($sql);        
        while (@$row = mysqli_fetch_array($result)){
            $rows[]=$row;
        }
        return $rows;
    }
    
    function  getResultNum($sql){
        $result = $this->connection->query($sql);
        return mysqli_num_rows($result);
    }
    
    
}

