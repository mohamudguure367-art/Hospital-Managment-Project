<?php
include "conn.php";
//insert data to the database 
if (isset($_POST["submit"])) {
    $fullname = $_POST['fname'];
    $age = $_POST['age'];

    $sql = "INSERT INTO exams(fname,age) VALUES('$fullname','$age')";
    $result = mysqli_query($rel, $sql);
    if ($result) {
        echo "Waa Lagu Xareyay";
    } else {
        echo "Waxba Kuma xareesmin" . mysqli_error($rel);

    }
    header("Location: index.php");
    exit();

}

//update the existing user

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fname'];
    $age = $_POST['age'];
    $record = "UPDATE exams SET fname='$fullname', age='$age' WHERE id=$id";
    mysqli_query($rel, $record);
    header("Location: index.php");
}
//delete data from the database 
if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $query = "DELETE FROM exams WHERE id = '$id'";
    $result = mysqli_query($rel, $query);

    if ($result) {
        echo "Waku Guulesatay Delete gareenta";
    } else {
        echo "Cilad Ba ka Jirta Delete gareenta ";
    }

    header("Location: index.php");
    exit();
}

?>