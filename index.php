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

	$parts = explode(".", microtime(true));
	mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
	mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
	mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
	mt_srand(mt_rand(-microtime(true), microtime(true))/$parts[1]);
	$salter = ((float)(mt_rand(0,1)==1?'':'-').$parts[1].'.'.$parts[0]) / sqrt((float)$parts[1].'.'.intval(cosh($parts[0])))*tanh($parts[1]) * mt_rand(1, intval($parts[0] / $parts[1]));
	header('Context-salting: '. $salter);

	define('MAXIMUM_QUERIES', 56);
	ini_set('memory_limit', '64M');
	
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'apiconfig.php';
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';
	
	
	/**
	 * URI Path Finding of API URL Source Locality
	 */
	$source = (isset($_SERVER['HTTPS'])?'https://':'http://').strtolower(basename(__DIR__)).API_URL_BASE_PATH;
	$item = '';
	if (isset($_REQUEST['subdomain']) && !empty($_REQUEST['subdomain'])) {
		$sub = explode(".", $_SERVER["HTTP_HOST"]);;
		$item = $sub[0];
	} elseif (isset($_REQUEST['item']) && !empty($_REQUEST['item']))
	{
		$item = $_REQUEST['item'];
	}
	
	/**
	 * 
	 * Display Help if Function Variables Are Wrong
	 */
	if (empty($item) && empty($_REQUEST['url']) && checkDisplayHelp(isset($_REQUEST['action'])?$_REQUEST['action']:'')) {
		if (function_exists("http_response_code"))
			http_response_code(400);
		apiLoadLanguage('help');
		exit;
	}
	if (function_exists("http_response_code"))
		http_response_code(200);
		
	$action = $_REQUEST['action'];
	
		
	switch ($action) {
		case 'jump':
			$data = jumpFromShortenURL($item);
			break;
		case 'url':
			$data = jumpShortenURL($_REQUEST['url']);
			break;
	}
	$response = (isset($_REQUEST['response'])?$_REQUEST['response']:'raw');
	// Send Responses
	switch ($response) 
	{
		case 'raw':
			header('Content-type: text');
			die($data["short"]);
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
			$dom->fromMixed(array(basename(__DIR__)=>$data));
 			die($dom->saveXML());
			break;
	}
?>		
