<?php
const LIMIT = 2;

$leftList = [];
$rightList = [];
foreach (file('input.txt') as $line) {
    $pieces = explode('   ', $line, LIMIT);
    $leftList[] = $pieces[0];
    $rightList[] = (int)$pieces[1];
}
$rightList = array_count_values($rightList);

$sum = 0;
foreach ($leftList as $key => $left) {
    $occurrences = $rightList[(int)$left] ?? 0;
    $sum += ($left * $occurrences);
}
echo $sum;
