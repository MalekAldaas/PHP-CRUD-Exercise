
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once (__DIR__ . "/../../core/database.php"); 
        $field_id = $_POST['id']; 

        $db = new Database() ;
        $db->delete('categories', $field_id); 

        header("Location: delete.php");
        exit; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <h1>Delete Operation:</h1>
    <?php require (__DIR__ . "/../../views/table-view.php"); ?>
    <br>
    <form action="" method="post">
        <h2>Select ID to Delete.</h2>
        <br>
        <?php
        $ids = $db->getExistingIds('categories');
        foreach ($ids as $id): ?>
            <input type="radio" name="id" value="<?= $id; ?>"> <label><?= $id?></label>
            <br>
        <?php endforeach ?>
        <input type="submit" value="DELETE!">
    </form>
    
    <br>
    <a href = <?= "../index.php" ?> > <h2><center>HOME</center></h2></a>
</body>
</html>
