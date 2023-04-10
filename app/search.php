<?php
include('includes/config.php');
if(isset($_POST['submit'])){
    $query=$_POST['query'];
    $stmt=$dbh->prepare("SELECT * FROM tools WHERE ToolName LIKE :query ORDER BY rand() LIMIT 0,10");
    $stmt->bindValue(':query', '%'.$query.'%');


    $stmt->execute();
    if(!$stmt->rowCount()==0){
        while($row=$stmt->fetch()){
            
            
            echo $row['ToolName'];
            echo $row['ToolName'];
            echo $row['ToolName'];
        }
            
    }
}

?>