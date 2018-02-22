<?php
class ControllerErr404{
	
public static function err404(){
	require_once(ROOT.'/views/404/index.php');
	
	return TRUE;
	}
}