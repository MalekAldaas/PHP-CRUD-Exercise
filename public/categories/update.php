<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once (__DIR__ . "/../../core/database.php"); 
        $db = new Database() ;

        $field_name = $_POST['field']; 
        $new_value = $_POST['name']; 
        $field_id = $_POST['id']; 
        $db->update('categories', $field_id, $field_name, $new_value) ;

        header("Location: update.php");
        exit; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <h1>Update Operation:</h1>
    <br>
    <?php require (__DIR__ . "/../../views/table-view.php"); ?>

    <br>
    <form action="" method="post">
    <h2>Select ID to Update.</h2>

    <?php
    $ids = $db->getExistingIds('categories');
    foreach ($ids as $id): ?>
        <input type="radio" name="id" value=<?= $id ?>> <label><?= $id?></label>
        <br>
    <?php endforeach ?>
    <select name="field">
        <option value="name">name</option>
    </select>
    <br>
    <label>new value</label>
    <input type="text" name="name">
    <input type="submit" value="UPDATE">
    <br>
</form>
    
    <br>
    <a href = <?=  "../index.php" ?> > <h2><center>HOME</center></h2></a>
</body>
</html>


