<?php

function make_pipeline(...$funcs)
{
    return function ($arg) use ($funcs) {
        foreach ($funcs as $func) {
            $arg = call_user_func($func, $arg);
        }
        return $arg;
    };
}

$fun = make_pipeline(function ($x) {
    return $x * 3;
},
    function ($x) {
        return $x + 1;
    },
    function ($x) {
        return $x / 2;
    });
echo $fun(3);
