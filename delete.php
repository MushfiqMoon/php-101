<?php
include "./connection.php";

$id = $_GET['id'];
echo ($id);

$sql = "DELETE FROM `user` WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:/index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>