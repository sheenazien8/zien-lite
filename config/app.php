<?php
/*--------------------------------------------------------------------------------------------------
 * Error reporting
 * TRUE for Development
 * FALSE for Production
 * -------------------------------------------------------------------------------------------------
 */
$config['development'] = getenv('APP_DEBUG', true);
/*--------------------------------------------------------------------------------------------------
 * Setting database
 * -------------------------------------------------------------------------------------------------
 */
$config['database']['connection']   = getenv('DB_CONNECTION', false);
$config['database']['driver']       = getenv('DB_DRIVER', 'mysql');
$config['database']['host']         = getenv('DB_HOST', 'localhost');
$config['database']['username']     = getenv('DB_USER', 'root');
$config['database']['password']     = getenv('DB_PASSWORD', '');
$config['database']['dbname']       = getenv('DB_NAME', '');
