<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>First page</title>
</head>
<body>
<a href="/add">Add news</a>
<a href='/category'>back</a>
<?php foreach($newsCollection as $news): ?>
    <div style="border: 1px solid black">
        <h2><?=$news['title']?></h2>
        <p><?=$news['text']?></p>
        <div><strong><?=$news['author']?> (<?=$news['created_at']?>)</strong></div>
        <a href='<?=route('article', ['$id' => $news['id']])?>'>next-></a>
    </div>
<?php endforeach; ?>
</body>
