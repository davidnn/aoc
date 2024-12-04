<?php
const RE = "/((?<=mul\()(\d|[1-9]\d{1,2}),(\d|[1-9]\d{1,2})(?=\)))|(do\(\))|(don\'t\(\))/m";
$sum = 0;
$skip = false;
foreach (file('input.txt') as $line) {
    $matches = [];
    preg_match_all(RE, $line, $matches, PREG_SET_ORDER, 0);
    foreach ($matches as $match) {
        if ($match[0] === "don't()") {
            $skip = true;
        } elseif ($match[0] === "do()") {
            $skip = false;
            continue;
        }

        if ($skip) {
            continue;
        }
        $multipliers = explode(',', $match[0]);
        for ($i = 0, $iMax = count($multipliers); $i < $iMax; $i += 2) {
            $sum += ($multipliers[$i] * $multipliers[$i + 1]);
        }
    }
}

echo $sum;