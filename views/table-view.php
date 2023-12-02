<?php

require_once __DIR__ . "/../core/database.php";
$db = new Database();
$data = $db->select('categories');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    
    <link rel="stylesheet" href="../../views/style.css"> 
    <!--
        how to edit the above href so that no problem appears
        if I called the table-view.html anywhere else other than
        categories directory?.
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table view</title>
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created at</th>
        </tr>
        <?php foreach ($data as $item): ?>
            <tr>
                <td>
                    <?= $item['id'] ?>
                </td>
                <td>
                    <?= $item['name'] ?>
                </td>
                <td>
                    <?= $item['created_at'] ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>
