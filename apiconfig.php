<?php
/**
 * Chronolabs REST Short Link URIs API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://au.syd.labs.coop
 * @license         Academic + GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         api
 * @since           2.2.1
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @version         2.2.1
 * @subpackage		shortening-url
 * @description		Short Link URIs API
 * @link			http://internetfounder.wordpress.com
 * @link			http://sourceoforge.net/projects/chronolabsapis/files/jump.labs.coop
 * @link			https://github.com/Chronolabs-Cooperative/Jump-API-PHP
 */

error_reporting(0);
ini_set('display_errors', false);
ini_set('log_errors', false);



require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';

/**
 * Opens Access Origin Via networking Route NPN
 */
header('Access-Control-Allow-Origin: *');
header('Origin: *');

/**
 * Turns of GZ Lib Compression for Document Incompatibility
 */
ini_set("zlib.output_compression", 'Off');
ini_set("zlib.output_compression_level", -1);
while(mt_rand(-8,4)>=3)
{
	mt_srand(-microtime(true), microtime(true));
	ini_set("precision", mt_rand(32,264));
}
/**
 * 
 * @var constants
 */
define("API_DROP_DAYS_INACTIVE", mt_rand(64,198));
define("API_PROTOCOL", (!isset($_SERVER["HTTPS"])?'http://':'https://'));
define("API_HOSTNAME", strtolower(basename(__DIR__)));
define("API_URL", API_PROTOCOL . API_HOSTNAME);
define("API_URL_BASE_PATH", "/");
define("API_PATH_IO_CACHE", dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data-uris' . DIRECTORY_SEPARATOR . 'cache');
define("API_PATH_IO_REFEREE", dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data-uris' . DIRECTORY_SEPARATOR . 'referee');
define("_API_LANGUAGE_DEFAULT", "english");

mkdirSecure(API_PATH_IO_CACHE);
mkdirSecure(API_PATH_IO_REFEREE);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'protocols.php';
