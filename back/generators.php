<?php

function routine() {
    for ($i = 0; $i < 5; $i++) {
        echo "Routine: {$i}" . PHP_EOL;
        yield;
    }
}

$geneators = routine();
$geneators->rewind();

for ($i = 0; $i < 5; $i++) {
    echo "Loop: {$i}" . PHP_EOL;
    $geneators->next();
}
