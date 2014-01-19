<?php

namespace Vendor\Entity;

// Your custom class dir
define('CLASS_DIR', 'Vendor/Entity/');
// Add your class dir to include path
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);

// You can use this trick to make autoloader look for commonly used "My.class.php" type filenames
spl_autoload_extensions('.php');

// Use default autoload implementation
spl_autoload_register();

try {
    //create instances
    $entity3 = new Entity3();
    $entity5 = new Entity5();
    $entity10 = new Entity10();
    $entity20 = new Entity20();

    //set existed property
    $entity10->pr1 = 1;
    echo 'The property $entity10->pr1 is setted to '.$entity10->pr1."\n";

    //check existing of pr2
    $entity3 = new Entity3();
    if (empty($entity3->pr2)) {
        echo 'The property $entity3->pr2 is empty '."\n";
    }
    //set $entity3->pr2
    $entity3->pr2 = 2;
    echo 'The property $entity3->pr2 is setted to '.$entity3->pr2."\n";

    //set and unset property
    $entity5->pr4 = 4;
    echo 'The property $entity5->pr4 is setted to '.$entity5->pr4."\n";
    unset($entity5->pr4);
    //call unsetted propertie
    echo 'The property $entity5->pr4 is unsetted:  '.$entity5->pr4."\n";
    
    //set not existed property
    $entity20->pr22 = 12;
} catch (\Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}