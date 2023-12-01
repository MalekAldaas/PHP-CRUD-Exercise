<?php

    require_once __DIR__ . "/../core/database.php"; 
    $db = new Database(); 
    $data = $db->select('categories') ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table view</title>
</head>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created at</th>
        </tr>
        <?php foreach($data as $item): ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['created_at'] ?></td>
            </tr>
            <?php endforeach ?>
    </table>
<body>
    
</body>
</html>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
</style>
