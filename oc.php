<?php

// Set the working directory to the Laravel root
chdir(__DIR__);

// Run the artisan command
$output = shell_exec('php artisan optimize:clear 2>&1');

// Display the output
echo "<pre>$output</pre>";
