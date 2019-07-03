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

/**
 * 
 * @var constants
 */
define('API_DEPLOYMENT_URL', 'http://deploy.snails.email');
// define('API_DEPLOYMENT_USERNAME', '');
// define('API_DEPLOYMENT_PASSWORD', '');
// define('API_DEPLOYMENT_EMAILDOMAIN', '');
// define('API_DEPLOYMENT_ROOTDOMAIN', '');
define("API_DEPLOYMENT_AUTH_URL", API_DEPLOYMENT_URL . '/v1/auth.api');
define("API_DEPLOYMENT_CALLBACK_FUNCTION_URL", API_DEPLOYMENT_URL . '/v1/%s/%s/callback.api');
define("API_DEPLOYMENT_CALLBACK_FUNCTION_MODAL_URL", API_DEPLOYMENT_URL . '/v1/%s/%s/%s/callback.api');
define("API_DEPLOYMENT_JUMPAPI_HOSTNAMES", API_DEPLOYMENT_URL . '/v1/hostnames.txt');
define("API_DEPLOYMENT_CALLING", false);


