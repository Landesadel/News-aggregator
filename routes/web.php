<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "
<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>First page</title>
</head>
<body>
    <h1>Welcome!</h1>
    <a href='/about'>about</a>
    <a href='/news'>news</a>
</body>
";
});

Route::get('/about', function () {
    return "
<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>about</title>
</head>
<body>
    <h1>about project</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, animi architect</p>
    <a href='/'>home</a>
</body>
";

});

Route::get('/news', function () {
    return "
<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>News</title>
</head>
<body>
    <h1>News:</h1>
    <ul>
        <li>
            <h3>News-1</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, animi architect
                amet consequatur earum exercitationem explicabo iste maxime nam natus nihil nisi quae
                quam qui quo quos recusandae repellendus, reprehenderit rerum sed sequi suscipit tenetur, ut.
            </p>
        </li>
        <li>
            <h3>News-2</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci,
                amet consequatur earum exercitationem explicabo iste maxime nam natus nihil nisi quae
                quam qui quo quos recusandae repellendus, reprehenderit rerum sed sequi suscipit tenetur, ut.
                Eaque excepturi maxime natus. Neque!
            </p>
        </li>
        <li>
            <h3>News-3</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem nesciunt
                perspiciatis quibusdam sapiente vero? Animi excepturi pariatur soluta ut veritatis voluptatem.
                Autem incidunt ipsam iure minima repellat. Eos, odit.
            </p>
        </li>
    </ul>

    <a href='/'>home</a>
</body>
";

});
