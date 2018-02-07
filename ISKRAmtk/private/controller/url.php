<?php
// файл открывается в index.php
//Все Функции находятся в файле controller.php
// Здесь создаем имена функций для их отработки


// обработка адресной строки
// разделяем строку адреса на составляющие, выбераем путь после '/'
// $uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
// $url_j=file_get_contents("private/controller/url.json");
// var_dump($_SERVER['REQUEST_URI']);
// $urls= trim($uri, '/') ? : "index";
// // записываем имя функции. 
// // $urls=$urls.'Action';
// //если получившейся функции нет, выдаем ошибку
// // if(!function_exists ($urls)){
// // 	// header($_SERVER["SERVER_PROTOCOL"]);
// // 	exit("404 Страница не найдена");
// // }
// $control_json=json_decode($url_j);
// $control_json_arr=$control_json->$urls;
// var_dump($control_json);
// var_dump($control_json_arr);
// foreach ($control_json_arr as $key => $value) {
// 	include_once $value;
// }
/**
* 
*/
class UrlJson 
{
	private $uri;
	private $file_json;
	private $obj_json;
	private $arr_json;
	public $adm_db; 
    
    
	public function UrlJsonControl()
	{

        // читает из адресной строки браузера
		$uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
		$uri=trim($uri, '/') ? : "index";
        
        // создаем адресный массив
        $uri_arr = explode('/', $uri);
        $leng = count($uri_arr);        
        
		// читает из файла json и переводит в объект формат         
        $file_json=file_get_contents("private/controller/url.json");
		$obj_json=json_decode($file_json);

        
        // подключение баз данных. Файлы находятся в разделе модель
        require_once "private/model/DB.php";
        require_once "private/model/CreateDB.php";
        $db_obj = new DB;
        $quer_result = $db_obj->quering();
        $arr_dbs = $db_obj->bdConnect();
        $arr_tabl = $db_obj->ShowTable();
        //запускаем функцию для отправки запроса в db. 
        
        $db_upr= new CreateDB;
        $SelectDb = $db_upr->DbCreate();
        
        // цикл просчета уровня глубины адреса и запуска подключения файлов, в соответствии с массивом адреса
        // на странице возможно только одно подменю
        for($i=0; $i<$leng; $i++){
            
           // здесь i это глубина
            $uri=$uri_arr[$i];
            $arr_json=$obj_json->$uri;            
            if (isset($arr_json) & gettype($arr_json)==="object"){
                foreach ($arr_json as $key => $value){
                    if(gettype($value)==="string"){
                        include_once $value;// подключение файла, адрес из файла json                       
                    } else if(gettype($value)=="object"){
                        $temp_val = $value;// временная переменная используется только здесь
                    }
                }                
            } else {
                include_once $arr_json;
            }            
           $obj_json = $temp_val;
        }
        
	}
}
?>