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
 * @subpackage		deploy-jump-api
 * @description		Cron Job for Calling to Short Link Deployment API
 * @link            https://github.com/Chronolabs-Cooperative/Deploy-Jump-API-PHP
 * @link			https://github.com/Chronolabs-Cooperative/Jump-API-PHP
 */

	include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'deployment.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'apiconfig.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions.php';
	
	
	if (constant('API_DEPLOYMENT_CALLING') == true) {
	    if (!is_file($callfile = API_PATH_IO_REFEREE  . DIRECTORY_SEPARATOR . API_HOSTNAME . '.calling.json'))
	        $calls = array();
        else
            $calls = json_decode(file_get_contents($callfile), true);
        
        if (count($calls) > 0)
            foreach($calls as $type => $typals)
                foreach($typals as $hash => $actions)
                    foreach($actions as $time => $values) {
                        $authkey = json_decode(getURIData(API_DEPLOYMENT_AUTH_URL, 25, 25, array('username' => API_DEPLOYMENT_USERNAME, 'password' => API_DEPLOYMENT_PASSWORD, 'format' => 'json')), true);
                        @getURIData(sprintf(API_DEPLOYMENT_CALLBACK_FUNCTION_MODAL_URL, $authkey['authkey'], $type, $hash, 180, 180, array_merge(array('type' => $type, 'hostname' => $hostname, 'time' => $time, 'key' => $hash, 'format' => 'json'), $values)));
                        unset($calls[$type][$hash][$time]);
                        writeRawFile($callfile, json_encode($calls));
                        $calls = json_decode(file_get_contents($callfile), true);
                    }
        
	}
