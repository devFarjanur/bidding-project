<?php

// Set the working directory to the Laravel root
chdir(__DIR__);

// Run the artisan command
$output = shell_exec('php artisan optimize:clear 2>&1');

// Check if the command ran successfully by checking the output for specific success messages
if (strpos($output, 'Cleared!') !== false) {
    // Display the output
    echo "<pre>$output</pre>";
    echo "<h2>✅ Command executed successfully!</h2>";
} else {
    // Display the output if there is an error
    echo "<pre>$output</pre>";
    echo "<h2>❌ There was an error executing the command.</h2>";
}
