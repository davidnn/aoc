<?php
const RE = '/(?<=mul\()(\d|[1-9]\d{1,2}),(\d|[1-9]\d{1,2})(?=\))/m';
$sum = 0;
foreach (file('input.txt') as $line) {
    $matches = [];
    preg_match_all(RE, $line, $matches, PREG_SET_ORDER, 0);
    foreach ($matches as $match) {
        $multipliers = explode(',', $match[0]);
        for ($i = 0, $iMax = count($multipliers); $i < $iMax; $i += 2) {
            $sum += ($multipliers[$i] * $multipliers[$i + 1]);
        }
    }
}

echo $sum;