<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2006 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

switch($op) {
	
	
	case "Setup_year":
	case "Changepass":
	case "Configure":
	case "ConfigSave":
	case "SystemSave":
	case "SeoTag":
	case "UpdateTagSeo":
	case "DelSeoTag":
    case "LogSystem":
    case "DeleteSystemLog":
    case "DeleteAllSystemLog":
	
	

	include("admin/modules/settings.php");
	break;

}

?>