<?php
// Clear all Laravel caches
exec('php artisan cache:clear');
exec('php artisan config:clear');
exec('php artisan route:clear');
exec('php artisan view:clear');
exec('php artisan optimize:clear');
echo "All caches cleared!<br>";

// Define the target and symlink paths
$target = '/home/qualifi2/admin.qualifiedconsultant.com.np/storage/app/public';
$link = '/home/qualifi2/admin.qualifiedconsultant.com.np/public/storage';

// Check if the symlink or folder exists
if (file_exists($link)) {
    // If the symlink or folder exists, remove it
    if (is_link($link) || is_dir($link)) {
        // Remove symlink or folder
        if (is_link($link)) {
            unlink($link); // Remove the symlink
            echo 'Existing symlink removed.<br>';
        } else {
            rmdir($link); // Remove the folder
            echo 'Existing folder removed.<br>';
        }
    }
}

// Create the symlink
if (!file_exists($link)) {
    symlink($target, $link); // Create the symlink
    echo 'Symlink created successfully!';
} else {
    echo 'Symlink already exists!';
}


echo "PDO available: " . (class_exists('PDO') ? 'Yes' : 'No') . "<br>";
echo "pdo_mysql available: " . (in_array('mysql', PDO::getAvailableDrivers()) ? 'Yes' : 'No');
?>
