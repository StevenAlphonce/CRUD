<?php

class Database{

    private $connection;

        //Constructor
        function __contruct(){

            $this->connect_db();
            //$this->sanitize();
        }

        //Connection function
        public function connect_db(){

            $this->connection = mysqli_connect('localhost','root','','crud');

            if (mysqli_connect_error()){

                die("Database connection Failed".mysqli_connect_error().mysqi_connect_errorno());
            }
    }

    //Sanitize data before submmiting them to database
    public function sanitize($var){
        $return = mysqli_real_escape_string($this->connection,$var);
        return $return;
    }

    //method to insert data to 'User' database table
    public function create($fname,$lname,$email,$gender,$age){
        $sql = "INSERT INTO `user` (firstname, lastname, email, gender, age) VALUES ('$fname', '$lname', '$email', '$gender', '$age')";
        $res = mysqli_query($this->connection, $sql);
        if($res){
             return true;
        }else{
            return false;
        }
    }

    //Method to read data from 'user' database table
    public function read($id=null){
        $sql = "SELECT * FROM `user`";

        if($id){
            $sql.="WHERE id=$id";
        }
        $res=mysqli_query($this->connection,$sql);  
        return $res;
    }

    //Method to Update information
    public function update($fname,$lname,$email,$gender,$age, $id){
        $sql = "UPDATE `user` SET firstname='$fname', lastname='$lname', email='$email', gender='$gender', age='$age' WHERE id=$id";
        $res = mysqli_query($this->connection, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    //Method help to delete data.

    public function delete($id){
        $sql="DELETE FROM `user` WHERE id=$id";
        $res=mysqli_query($this->connection,$sql);

        if($res){
            return true;
        }else{
            return false;
        }
    }

}

$database=new Database();

$database->connect_db();
?>