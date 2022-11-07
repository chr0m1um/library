<?php 

require_once 'config/config.php';

require_once 'helpers/urlHelper.php';
    //require_once 'lib/Database.php';
    //require_once 'lib/Controller.php';
    //require_once 'lib/Core.php';

//Loading classes from the lib directory
spl_autoload_register(function($className) 
{
    require_once 'lib/' . $className . '.php';
});

?>