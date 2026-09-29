<?php

// redirects

if (isset($_SERVER['REQUEST_URI']) && strlen($_SERVER['REQUEST_URI']) > 1) {
    if ($_SERVER['REQUEST_URI'][-1] == '/') {
        header('Location: ' . substr($_SERVER['REQUEST_URI'], 0, -1));

        exit;
    }
}

// loader

spl_autoload_register(function ($className) {
    $dirList = [
        'lib',
        ''
    ];

    foreach ($dirList as $dir) {
        if ($dir) {
            $dir .= '/';
        }

        if (is_file($file = $dir . $className . '.php')) {
            include $file;

            return;
        }
    }
});

// boot

Application::boot();
