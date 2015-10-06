<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Configuration for: Project URL
 * Put your URL here, for local development "127.0.0.1" or "localhost" (plus sub-folder) is fine
 */
//define('URL', 'http://192.168.192.6/jvanautos/');
//define('URL', 'http://192.168.247.1/jvanautos/');
//define('URL', 'http://192.168.1.109/jvanautos/');
define('URL', 'http://jvandenbergautos.nl/jvanautos/');
//define('URL', 'http://192.168.2.20/jvanautos/');
//define('URL', http://145.93.35.199/jvanautos/');


/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'jvandenbergautos.nl.mysql');
define('DB_NAME', 'jvandenbergauto');
define('DB_USER', 'jvandenbergauto');
define('DB_PASS', 'VAXMSEDE');
