<?php

$sum = 0;
foreach (file('input.txt') as $line) {
    $cleanedLine = preg_replace('~\D~', '', $line);
    $sum += (int)($cleanedLine[0] . $cleanedLine[-1]);
}
echo $sum;
