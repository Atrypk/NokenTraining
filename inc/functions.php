<meta charset='UTF-8'>
<?php
require_once('session.php');
require_once('config.php');


if(DEBUG == 'true'){
    ini_set('display_errors', 1);
}else{
    ini_set('display_errors', 0);
}

require_once('tools.php');
require_once('tablas/kanjisClass.php');
require_once('tablas/usersClass.php');
?>