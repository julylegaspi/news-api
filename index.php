<?php
$data = file_get_contents('https://newsapi.org/v1/sources');
$news = json_decode($data);
$data = [];
foreach ($news->sources as $n) {
    $data[] = $n;
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
            <?php foreach($data as $d) : ?>
            <div class="col-md-3">
                <a href="news.php?source=<?=$d->id;?>"><img src="<?=$d->urlsToLogos->small;?>"></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
