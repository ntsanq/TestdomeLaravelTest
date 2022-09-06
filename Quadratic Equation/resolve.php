<?php

function findRoots($a, $b, $c): array
{
    $delta = pow($b, 2) - 4 * ($a * $c);
    $x = (-$b - sqrt($delta)) / (2 * $a);
    $y = (-$b + sqrt($delta)) / (2 * $a);
    return [$x, $y];
}

print_r(findRoots(2, 10, 8));
