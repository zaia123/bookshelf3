<?php
    session_start();
$name = "";
$book = "";
$year = "";
$genre = "";
$id = 0;
$edit_state = false;

    $db = mysqli_connect('localhost', 'root', '', 'crud');

    if (isset($_POST['save'])) {
       $name = $_POST['name'];
       $book = $_POST['book'];
       $year = $_POST['year'];
       $genre = $_POST['genre'];

       $query = "INSERT INTO info(name, book, year, genre) VALUES ('$name', '$book', '$year', '$genre' )";
       mysqli_query($db, $query);
       $_SESSION ['msg'] = "Story saved!";
       header('location: store.php');
    }
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $book = $_POST['book'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];
        $id = $_POST['id'];

        mysqli_query($db, "UPDATE info SET name = '$name', book ='$book', year = '$year', genre = '$genre' WHERE id=$id");
        $_SESSION ['msg'] = "Story updated!";
        header('location: store.php');
    }

    if(isset($_GET['del'])) {
        $id =$_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id=$id");
        $_SESSION ['msg'] = "Story deleted!";
        header('location: store.php');
    }

    $results = mysqli_query($db, "SELECT * FROM info");