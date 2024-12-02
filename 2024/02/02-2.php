<?php

const SAFE_DIFFERENCE = 3;
$safeCount = 0;

function isSafelyChanging(int $first, int $second): bool
{
    return $second <=> $first
        && $second - $first > 0
        && $second - $first <= SAFE_DIFFERENCE;
}

foreach (file('input.txt') as $line) {
    $safe = true;
    $pieces = explode(' ', $line);
    $direction = 0;
    $dampener = 1;
    foreach ($pieces as $key => $current) {
        // Skip first (there is nothing to compare against)
        if ($key === 0) {
            continue;
        }

        // Continue if increasing safely
        $previousKey = $key - 1;
        if ($direction >= 0 && isSafelyChanging((int)$pieces[$previousKey], (int)$current)) {
            $direction = 1;
            continue;
        }

        // Continue if decreasing safely
        if ($direction <= 0 && isSafelyChanging((int)$current, (int)$pieces[$previousKey])) {
            $direction = -1;
            continue;
        }

        // Falling through means neither increasing nor decreasing safely
        $dampener--;
        if ($dampener === 0) {
            continue;
        }
        $safe = false;
        break;
    }
    if ($safe) {
        $safeCount++;
    }
}

echo $safeCount;
