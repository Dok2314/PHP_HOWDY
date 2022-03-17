<?php
    use application\includes\Database;
    include "core.php";
    include "application/includes/errors.php";
    $db = new Database();
    $articles = $db->selectAll('articles');
    $categories = $db->selectAll('articles_categories');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Блог</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="application/assets/css/main.css">
</head>
<body>
<?php include "application/includes/header.php"; ?>
    <div class="container main-content">
        <div class="row">
            <div class="col-md-8 first">
                <div class="container">
                    <div class="row">
                        <?php foreach($articles as $article): ?>
                        <div class="col-md-12 obvod">
                            <a href="article.php?id=<?=$article['id'];?>"><h4 style="color: #fff;"><?php echo $article['title'];?></h4></a>
                            <p><?php echo $article['text'];?>
                            </p>
                            <h5 style="color: blue;">Дата создания: <?php echo $article['created_at'];?></h5>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 second">
                <h2>Категории</h2>
                <div class="col-md-8">
                    <?php foreach($categories as $category): ?>
                    <ul class="category">
                        <li><a href="/category.php?id=<?=$category['id'];?>"><?php echo $category['title']; ?></a></li>
                    </ul>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php include "application/includes/footer.php"; ?>
</body>
</html>