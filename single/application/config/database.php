<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------
  | DATABASE CONNECTIVITY SETTINGS
  | -------------------------------------------------------------------
  | This file will contain the settings needed to access your database.
  |
  | For complete instructions please consult the 'Database Connection'
  | page of the User Guide.
  |
  | -------------------------------------------------------------------
  | EXPLANATION OF VARIABLES
  | -------------------------------------------------------------------
  |
  |	['dsn']      The full DSN string describe a connection to the database.
  |	['hostname'] The hostname of your database server.
  |	['username'] The username used to connect to the database
  |	['password'] The password used to connect to the database
  |	['database'] The name of the database you want to connect to
  |	['dbdriver'] The database driver. e.g.: mysqli.
  |			Currently supported:
  |				 cubrid, ibase, mssql, mysql, mysqli, oci8,
  |				 odbc, pdo, postgre, sqlite, sqlite3, sqlsrv
  |	['dbprefix'] You can add an optional prefix, which will be added
  |				 to the table name when using the  Query Builder class
  |	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
  |	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
  |	['cache_on'] TRUE/FALSE - Enables/disables query caching
  |	['cachedir'] The path to the folder where cache files should be stored
  |	['char_set'] The character set used in communicating with the database
  |	['dbcollat'] The character collation used in communicating with the database
  |				 NOTE: For MySQL and MySQLi databases, this setting is only used
  | 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
  |				 (and in table creation queries made with DB Forge).
  | 				 There is an incompatibility in PHP with mysql_real_escape_string() which
  | 				 can make your site vulnerable to SQL injection if you are using a
  | 				 multi-byte character set and are running versions lower than these.
  | 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
  |	['swap_pre'] A default table prefix that should be swapped with the dbprefix
  |	['encrypt']  Whether or not to use an encrypted connection.
  |	['compress'] Whether or not to use client compression (MySQL only)
  |	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
  |							- good for ensuring strict SQL while developing
  |	['failover'] array - A array with 0 or more data for connections if the main should fail.
  |	['save_queries'] TRUE/FALSE - Whether to "save" all executed queries.
  | 				NOTE: Disabling this will also effectively disable both
  | 				$this->db->last_query() and profiling of DB queries.
  | 				When you run a query, with this setting set to TRUE (default),
  | 				CodeIgniter will store the SQL statement for debugging purposes.
  | 				However, this may cause high memory usage, especially if you run
  | 				a lot of SQL queries ... disable this to avoid that problem.
  |
  | The $active_group variable lets you choose which connection group to
  | make active.  By default there is only one group (the 'default' group).
  |
  | The $query_builder variables lets you determine whether or not to load
  | the query builder class.
 */


$active_group = 'default';
if ($_SERVER['HTTP_HOST'] == 'localhost')
    $active_group = 'localhost';
$query_builder = TRUE;


$db['default'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'india987#$',
    'database' => 'single',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);


$db['localhost'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'fromhar',
    'database' => 'CI_DTS',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);


$db['maintenance'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'india987#$',
    'database' => 'algdts-maintenance',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

$db['patents'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'india987#$',
    'database' => 'algdts-patents',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

$db['prosecution'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'india987#$',
    'database' => 'algdts-prosecution',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);


$db['opposition'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'india987#$',
    'database' => 'algdts-opposition',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);



$db['enforcement'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'india987#$',
    'database' => 'algdts-enforcement',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);


$db['counseling'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'india987#$',
    'database' => 'algdts-counseling',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);


$db['domain'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'india987#$',
    'database' => 'algdts-domain',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

$db['design'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'india987#$',
    'database' => 'algdts-design',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);


$db['iplitigation'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'india987#$',
    'database' => 'algdts-iplitigation',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);


$db['litigation'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'india987#$',
    'database' => 'algdts-litigation',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

/*
 *
 * domians
 * design
 * iplitgatigation
 * lotigation
 */