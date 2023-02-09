<?php

$a = [1, 2, 3, 4];


function some(array $arr): array
{
    return [
        'vel1' => $arr[1],
        'vel2' => $arr[2],
        'vel3' => $arr[3],
    ];
}

var_dump(some($a));
