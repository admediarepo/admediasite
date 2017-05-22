<?php
session_start();
/**
 * Global configs, set here!
 */
$GLOBALS['config'] = [
    'mysql' => [
        'host'      => '...',
        'username'  => '...',
        'password'  => '...',
        'db'        => '...'
    ],
    'app' => [
    	'name' => 'AdMedia',
    ],
];

/**
 * Global requires
 */
require_once __DIR__.'/../system/classes/DB.php';
require_once __DIR__.'/../system/classes/Config.php';
require_once __DIR__.'/../system/functions/Helpers.php';



/**
 * Instance of database connection
 * @var DB
 */

try{
	$db = new DB(
		Config::get('mysql/host'), 
		Config::get('mysql/username'), 
		Config::get('mysql/password'), 
		Config::get('mysql/db')
	);
	$db = DB::getInstance();
} catch(Exception $e){
	die("Error " . $e->getLasErrno());
}

/**
 * Get the Instance of Connection!
 * @var Object :D
 */


