<?php
include 'db.php';

$id = $_GET['id'];

$deleteQuery = "DELETE FROM books WHERE id = $id";

if (mysqli_query($conn, $deleteQuery)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
