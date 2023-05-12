<?php

\Co\run(function() {
    go(function() {
        Co::sleep(2);
        echo 'Apos 2 segundos'. PHP_EOL;

    });
    go(function() {
        Co::sleep(1);
        echo 'Apos 1 segundo'. PHP_EOL;
    });
});

