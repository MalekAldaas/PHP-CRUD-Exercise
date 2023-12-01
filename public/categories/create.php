
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once __DIR__ . "/../../core/database.php"; 
        $db = new Database(); 

        $name = $_POST['name']; 
        $db->insert('categories', ['id', 'name', 'created_at'], ['null', $name, 'CURRENT_TIMESTAMP']) ;

        header("Location: create.php") ;
        exit; 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>
</head>
<body>
    <h1>Insert Operation:</h1> <br>
    <?php require_once "../../views/table-view.php"; ?> <br>
    <form action="" method="post">
        <label>Categorie Name: </label>
        <input type="text" name="name"> <br>
        <input type="submit" value="Add Item">
    </form>
    <br>
    <a href = <?= "../index.php"?> ><h2><center>HOME</center></h2></a>
</body>
</html>

