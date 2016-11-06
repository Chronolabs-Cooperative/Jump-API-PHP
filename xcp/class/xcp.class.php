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

if (!class_exists('xcp'))
{
	/**
	 *
	 * @author 		Simon Antony Roberts aka. Leshy Cipherhouse <wishcraft@users.sourceforge.net>
	 * @package 	checksum
	 * @subpackage 	xcp
	 * @version 	2.0.2
	 * @copyright 	Chronolabs Cooperative Copyright (c) 2015
	 * @category 	forensics
	 * @namespace	xcp
	 * @since		2.0.2
	 * @license		GPL2
	 * @link		https://sourceforge.net/projects/chronolabs
	 * @link		https://sourceforge.net/projects/xortify
	 * @link		https://xortify.com/xcp
	 *
	 */
	class xcp
	{
		var $base;
		var $enum;
		var $seed;
		var $crc;
			
		function __construct($data, $seed, $len=29)
		{
			$this->seed = $seed;
			$this->length = $len;
			$this->base = new xcp_base((int)$seed);
			$this->enum = new xcp_enumerator($this->base);
			
			if (!empty($data))
			{
				/**
				 * @version 	2.0.2
				 * @summary 	data escape html with special slashes special chars
				 * @author 		Simon Roberts aka. Leshy <wishcraft@users.sourceforge.net>
				 */
				$data = addslashes(htmlspecialchars(htmlspecialchars_decode($data)));				for ($i=1; $i<strlen($data); $i++)
				{
					$enum_calc = $this->enum->enum_calc(substr($data,$i,1),$enum_calc);
				}		
				$xcp_crc = new xcp_leaver($enum_calc, $this->base, $this->length);	
				$this->crc = $xcp_crc->crc;			
			}
			
		}
			
		function calc($data)
		{
			/**
			 * @version 	2.0.2
			 * @summary 	data escape html with special slashes special chars
			 * @author 		Simon Roberts aka. Leshy <wishcraft@users.sourceforge.net>
			 */
			$data = addslashes(htmlspecialchars(htmlspecialchars_decode($data)));
			for ($i=1; $i<strlen($data); $i++)
			{
				$enum_calc = $this->enum->enum_calc(substr($data,$i,1),$enum_calc);
			}		
			$xcp_crc = new xcp_leaver($enum_calc, $this->base, $this->length);	
			return $xcp_crc->crc;
		}
	}
}				

require ('xcp.base.php');
require ('xcp.enumerator.php');
require ('xcp.leaver.php');		
		
		
