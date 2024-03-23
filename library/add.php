<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publication_year = $_POST['publication_year'];

    $insertQuery = "INSERT INTO books (title, author, publication_year) VALUES ('$title', '$author', '$publication_year')";

    if (mysqli_query($conn, $insertQuery)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
