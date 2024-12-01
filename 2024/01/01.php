<?php
const LIMIT = 2;

$leftList = [];
$rightList = [];
foreach (file('input.txt') as $line) {
    $pieces = explode('   ', $line, LIMIT);
    $leftList[] = $pieces[0];
    $rightList[] = $pieces[1];
}
sort($leftList);
sort($rightList);

$sum = 0;
foreach ($leftList as $key => $left) {
    $sum += abs($left - $rightList[$key]);
}
echo $sum;
