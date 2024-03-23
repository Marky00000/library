<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Library System</h1>
    <h2>All Books</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Publication Year</th>
            <th>Action</th>
        </tr>
        <?php
        // Establishing database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "library";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT * FROM books";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['author'] . "</td>";
                echo "<td>" . $row['publication_year'] . "</td>";
                echo "<td>
                        <a href='edit.php?id=".$row['id']."'>Edit</a> |
                        <a href='delete.php?id=".$row['id']."' class='delete-link'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No books available</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </table>

    <h2>Add New Book</h2>
    <form action="add.php" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>
        <label for="author">Author:</label>
        <input type="text" name="author" required><br>
        <label for="publication_year">Publication Year:</label>
        <input type="text" name="publication_year" required><br>
        <button type="submit">Add Book</button>
    </form>
</body>
</html>
