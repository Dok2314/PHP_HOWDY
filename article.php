<?php
use application\includes\Database;
include "core.php";
include "application/includes/errors.php";
$db      = new Database();
$id      = $_GET['id'];
$article = $db->selectAll('articles',['id' => $id]);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сатья</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="application/assets/css/main.css">
</head>
<body>
<?php include "application/includes/header.php"; ?>
    <h1 style="text-align: center;">Статья: <span style="color: green;">"<?=$article[0]['title'];?>"</span></h1>
    <p style="text-align: left;font-size: 20px;"><?=$article[0]['text'];?></p>
    <strong>Дата создания: <span style="color: red;"><?=$article[0]['created_at'];?></span></strong>
<?php include "application/includes/footer.php"; ?>
</body>
</html>