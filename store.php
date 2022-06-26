<?php include('server.php'); 


    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db, "SELECT *FROM info WHERE id=$id");
        $record = mysqli_fetch_array($rec);
        $name = $record['name'];
        $book = $record['book'];
        $year = $record['year'];
        $genre = $record['genre'];
        $id = $record['id'];
    }
    ?>
    <? session_start();
if(empty($_SESSION['id'])):
    header('Location:main.html');
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>THE BOOK SHELF</title>
    <link rel="stylesheet" href="1style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="full-page">
        <div class="sub-page">
            <div class="navigation-bar">
                <div class="logo">
                    <a>THE BOOK SHELF</a>
                </div>
                <nav>
                    <ul id='MenuItems'>
                        <li><a href='main.html'>Home</a></li>
                        <li><a href='about.html'>About</a></li>
                        <li><a href='store.php'>Information</a></li>
                        <li><a href='contact.html'>Contact</a></li>
                        <li><a href='logout.php'>Logout</a></li>
                    </ul>
                </nav>
            </div>
    <table>
        <thead>
            <tr>
                <th>Author</th>
                <th>Book</th>
                <th>Year Published</th>
                <th>Genre</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                     <td><?php echo $row['name']; ?></td> 
                   <td><?php echo $row['book']; ?></td> 
                   <td><?php echo $row['year']; ?></td> 
                   <td><?php echo $row['genre']; ?></td> 
                    <td>
                        <a class="edit_btn"href="store.php?edit=<?php echo $row['id']; ?>">Edit</a>
                    </td>
                    <td>
                         <a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
                    </td>
           <?php } ?>
            
        </tbody>
    </table>
          
    <form method="post" action="server.php">
    <input type="hidden" name = "id" value ="<?php echo $id; ?>" >
        <div class= "input-group">
            <label>Author</label>
            <input type="text" name="name" value = "<?php echo $name; ?>">
    </div>
    <div class= "input-group">
            <label>Book</label>
            <input type="text" name="book" value = "<?php echo $book; ?>">
    </div>
    <div class= "input-group">
            <label>Year Published</label>
            <input type="text" name="year" value = "<?php echo $year; ?>">
    </div>
    <div class= "input-group">
            <label>Genre</label>
            <input type="text" name="genre" value = "<?php echo $genre; ?>">
            
    </div>
            
    <div class= "input-group">
    <?php if ($edit_state == false): ?>
            <button type="submit" name="save" class="btn">Save</button>
    <?php else: ?>
        <button type="submit" name="update" class="btn">Update</button>
    <?php endif ?>

    </div>
    </form>
</body>
</html>