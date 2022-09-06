<?php
function groupByOwners(array $files): array
{
    $result = [];
    foreach ($files as $file => $owner) {
        $result[$owner][] = $file;
    }

    return $result;
}

$files = array
(
    "Input.txt" => "Randy",
    "Code.py" => "Stan",
    "Output.txt" => "Randy"
);
var_dump(groupByOwners($files));
