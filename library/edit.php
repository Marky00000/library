<?php
include 'db.php';

$id = $_GET['id'];

$query = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publication_year = $_POST['publication_year'];

    $updateQuery = "UPDATE books SET title = '$title', author = '$author', publication_year = '$publication_year' WHERE id = $id";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Book</h1>
    <form action="" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>
        <label for="author">Author:</label>
        <input type="text" name="author" value="<?php echo $row['author']; ?>" required><br>
        <label for="publication_year">Publication Year:</label>
        <input type="text" name="publication_year" value="<?php echo $row['publication_year']; ?>" required><br>
        <button type="submit">Update Book</button>
    </form>
</body>
</html>
