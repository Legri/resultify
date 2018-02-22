<?php
class AdminController{
		


public function actionAuthorization(){
	
	require_once(ROOT.'/views/admin/authorization.php');
	return TRUE;
	}
public static function login($username,$password) {
	include(ROOT.'/config/user_config.php');

if ($username== $clogin && $password == $cpassword){
		$_SESSION['user']=TRUE;
		$_SESSION['status']='Password entered correctly';
		?><script type="text/javascript">
window.location = "/main"
</script><?php
		
	}else{
		$_SESSION['user']=FALSE;
		$_SESSION['status']='Password entered incorrectly';
	}
	
	}
public static function out() {
$_SESSION = array(); //Очищаем сессию
session_destroy(); //Уничтожаем
}

}