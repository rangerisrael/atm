<?php

//directory separator is \
	define('DS',DIRECTORY_SEPARATOR);
// root is path file 
	define('ROOT',dirname(__FILE__));


require_once(ROOT. DS . 'configuration'. DS . 'config.php');

		//autoload the file

			function autoload($className){
				if(file_exists(ROOT . DS . 'pages' . DS . $className . '.php')){
					require_once(ROOT . DS . 'pages' . DS . $className . '.php');
				}
				elseif(file_exists(ROOT . DS . 'classes' . DS . $className . '.php')){
					require_once(ROOT . DS . 'classes' . DS . $className . '.php');
				}
				else{
					die('PATH is missing');
					exit();
				}
			}

spl_autoload_register('autoload');

header('Location:pages/index.php');