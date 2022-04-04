<?php
require_once('database.php');
$id=$_GET['id'];

$res=$database->delete($id);

if($res){
    header('Location:view.php');
}else{
    echo "Failed to Deete Record";
}

?>