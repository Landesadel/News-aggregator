<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Category</title>
</head>
<body>
    <?php foreach ($categoryCollection as $category): ?>
    <a href='/news'><?=$category?></a>
    <?php endforeach; ?>

    <a href='/'>back</a>
</body>
