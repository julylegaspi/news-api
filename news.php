<?php
$source = $_GET['source'];
$apiKey = '5c787bfea3344dca8511b5fb39f4c7c5';
$data = file_get_contents("https://newsapi.org/v1/articles?source={$source}&sortBy=top&apiKey={$apiKey}");
$news = json_decode($data);
$articles = [];
foreach ($news->articles as $n) {
    $articles[] = $n;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>body{padding-top: 40px;}</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Source : <?=strtoupper(str_replace('-', ' ', $source));?> | <a href="index.php">Back to home</a></h1> 
            </div>
            <?php foreach($articles as $d) : ?>
            <div class="col-md-4">
                <a href="<?=$d->url;?>" target="_blank"><img src="<?=$d->urlToImage;?>" width="300" height="200"></a>
                <p><h4><a href="<?=$d->url;?>" target="_blank"><?=$d->title;?></a></h4></p>
                <p><small><?=$d->description;?></small></p>
                <p><?=$d->publishedAt;?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>