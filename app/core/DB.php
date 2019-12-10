<?php
class DB {
    public $conn;
    public $servername = "localhost";
    public $dbname = "shopping0205";
    public $username = "root";
    public $password = "";
    private $stmt = null;

    // public $servername = "databases-auth.000webhost.com";
    // public $dbname = "id11716904_shopping0205";
    // public $username = "id11716904_bluenight0104	";
    // public $password = "abcd@1234";
    // private $stmt = null;


    function __construct(){
       $this->conn =  new mysqli($this->servername,$this->username,$this->password,$this->dbname);
       if(!$this->conn){
           die ("Connection failed:". mysqli_connect_error());
       }
    //    echo " access to DB succed !";
       mysqli_select_db($this->conn,$this->dbname);
       mysqli_query($this->conn, "SET NAMES utf8");
    //    echo ' called contruct in DB';
       
    }

    function executeQuery( string $sql, array $options =[]){
        $this->stmt = $this->conn->query($sql);
        $a = $this->conn->prepare($sql); // prepare for using in execute() method
        // echo '<pre>'.''; print_r(fetch($this->stmt));die;

        $b = $a->execute(); // this is time 2 execute this *** try catch WHETHER IT IS ABLE TO RUN OR NOT return TRUE/FALSE
        return $b;          // 1st: query | 2nd : execute
    }

    // function update($sql){
    //     $check = $this->executeQuery($sql);
    //     if (!$check){
    //         return false;
    //     }
    //     return true;
    // }  
    function DoAquery(string $sql){
        return $this->stmt = $this->conn->query($sql);
    }

    function getLastId(string $sql){
        $check = $this->conn->prepare($sql)->execute();
        // echo '<pre>';
        // $a = $this->conn->prepare($sql);
        // var_dump($a); echo '<br>';
        // $check = $a->execute();

        // var_dump($check);
        // echo '<br>'.$sql; die;
        if(!$check){
            echo "can't not execute query ";
            die;
        }
        return $a = $this->conn->insert_id;   
    }



    function getMultipleRow(string $sql, array $options =[] ){
        $check = $this->executeQuery($sql,$options);
        
        if ( $check){
            // return mysqli_fetch_all($this->stmt);
            // echo '<pre>'; print_r(mysqli_fetch_array($this->stmt) ); die;
            $row = []; $queryArr =[];
            while ( $row = mysqli_fetch_object($this->stmt)) {
                array_push($queryArr,$row);
            }
            return $queryArr;
        }
        echo 'there is error';
        print_r(mysqli_fetch_all ($this->stmt));
        die;
        return false;
    }

    function getOneRow( string $sql, array $options = []){
        $check = $this->executeQuery($sql,$options);
        if($check){
            return mysqli_fetch_object($this->stmt);
        }
        print_r(mysqli_fetch_object($this->stmt));
        die;
        return false;
    }
}



?>