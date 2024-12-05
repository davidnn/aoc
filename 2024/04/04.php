<?php

function check_coordinate(array $plane, int $x, int $y, string $char): bool
{
    return isset($plane[$y][$x]) && $plane[$y][$x] === $char;
}

function search_from_position(array $plane, int $x, int $y): int
{
    $count = 0;
    $MAS = [1 => 'M', 'A', 'S'];

    // Up
    foreach ($MAS as $i => $char) {
        if (!check_coordinate($plane, $x, $y - $i, $char)) {
            break;
        }
        if ($char === 'S') {
            $count++;
        }
    }

    // Diagonally, up right
    foreach ($MAS as $i => $char) {
        if (!check_coordinate($plane, $x + $i, $y - $i, $char)) {
            break;
        }
        if ($char === 'S') {
            $count++;
        }
    }

    // Right
    foreach ($MAS as $i => $char) {
        if (!check_coordinate($plane, $x + $i, $y, $char)) {
            break;
        }
        if ($char === 'S') {
            $count++;
        }
    }

    // Diagonally, down right
    foreach ($MAS as $i => $char) {
        if (!check_coordinate($plane, $x + $i, $y + $i, $char)) {
            break;
        }
        if ($char === 'S') {
            $count++;
        }
    }

    // Down
    foreach ($MAS as $i => $char) {
        if (!check_coordinate($plane, $x, $y + $i, $char)) {
            break;
        }
        if ($char === 'S') {
            $count++;
        }
    }

    // Diagonally, down left
    foreach ($MAS as $i => $char) {
        if (!check_coordinate($plane, $x - $i, $y + $i, $char)) {
            break;
        }
        if ($char === 'S') {
            $count++;
        }
    }

    // Left (backwards)
    foreach ($MAS as $i => $char) {
        if (!check_coordinate($plane, $x - $i, $y, $char)) {
            break;
        }
        if ($char === 'S') {
            $count++;
        }
    }

    // Diagonally, up left
    foreach ($MAS as $i => $char) {
        if (!check_coordinate($plane, $x - $i, $y - $i, $char)) {
            break;
        }
        if ($char === 'S') {
            $count++;
        }
    }

    return $count;
}


$plane = [[], []];
foreach (file('input.txt') as $y => $line) {
    for ($x = 0, $xMax = strlen($line) - 1; $x < $xMax; $x++) {
        $plane[$y][$x] = $line[$x];
    }
}

$count = 0;
foreach ($plane as $y => $row) {
    foreach ($row as $x => $char) {
        if ($char === 'X') {
            $count += search_from_position($plane, $x, $y);
        }
    }
}

echo $count;