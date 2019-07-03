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

	include_once __DIR__ . DIRECTORY_SEPARATOR . 'deployment.php';
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'apiconfig.php';
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';
	
	$data = array('time' => time(), 'ip' => getIP(true));
	
	$response = (isset($_REQUEST['response'])?$_REQUEST['response']:'json');
	if (function_exists("http_response_code"))
	    if (isset($data['code']) && !empty($data['code'])) {
	        http_response_code($data['code']);
	        unset($data['code']);
	    } else {
	        http_response_code(201);;
	    }
	    
	// Send Responses
	switch ($response) 
	{
		case 'raw':
			header('Content-type: text');
			die($data["short"]);
			break;
		case 'php':
		    header('Content-type: application/php');
		    die("<?php\n\nreturn " . var_export($data) . ";\n\n?>");
		    break;
		case 'json':
			header('Content-type: application/json');
			die(json_encode($data));
			break;
		case 'serial':
			header('Content-type: text/html');
			die(serialize($data));
			break;
		case 'xml':
			header('Content-type: application/xml');
			$dom = new XmlDomConstruct('1.0', 'utf-8');
			$dom->fromMixed(array('root'=>$data));
 			die($dom->saveXML());
			break;
	}
?>		
