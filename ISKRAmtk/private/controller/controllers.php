<?php 
// namespace dat;
// use dat\DB;
// require_once __DIR__.'/model/DB.php';


class Action 
{
	
	
	function indexAction(){
		echo "ДАДАДАДАДАДАД";
		$h='Главная страница';
    	require_once 'private/view/templateView.php';
    	var_dump($_SESSION);
	}
	function databaseAction(){
		$file_upr='CreateDb_view.php';
		$h='Панель управления';
		$text_h='Редактор баз данных';
		$view='private/view/pu.php';
		include_once 'private/view/templateView.php';
		require_once 'private/model/DB.php';
		DB::bdConnect();
	}
}

?>