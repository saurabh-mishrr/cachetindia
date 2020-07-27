<?php

if (!function_exists('checkPermission'))
{

	function checkPermission($permissions)
	{
		$userAccess = getMyPermission(auth()->user()->roles);
		foreach ($permissions as $key => $value) {
			if ($value == $userAccess) {
				return true;
			}
		}
	}

}

if (!function_exists('getMyPermission')) 
{
	function getMyPermission($roleId)
	{
		switch ($roleId) {
			case '1':
				return 'user';
				break;
			
			default:
				return 'user';
				break;
		}
	}
}