<?php
// namespace dat;

class DB
{
	public static $quer;
    public static $quer_resultat;// в эту переменную записывается результат запроса к базе данных в таблицах

    static public function DB_Conect()
    {   
        
        // $db_name = $UrlJson1::$adm_db;//рассчет в url.php      
        
        // дома комп
		// $server="localhost:3606";		
		// $user = "root";
		// $password= "Bujhm1992";
//        
        // для компа на заводе
         $server="localhost";         
         $user = "root";
         $password="";
         
        $obj_UseDB = new CreateDB;
        $bd_name = $obj_UseDB->Select_DB();       

        
		if($connection = mysqli_connect($server, $user, $password, $bd_name)){
            return $connection;
            
		}else if($connection = mysqli_connect($server, $user, $password)){
            return $connection;
        }else{
            echo "Ошибка подключения";
        }
    }

    //просчет обработки пост запросов. Создание массива таблиц полученых из БД
    public  function quering(){
        self::$quer_resultat = NULL;
        $i=0;
        echo "<br><br> Просмотр массива _POST .......";
        var_dump($_POST);
        foreach ($_POST as $key => $value) {

            // разделяем полученый через POST SQL запрос с помощью разделителя "/"
            $sql_qury = explode("/", $value);

            // записываем в свойство объекта
            self::$quer=$sql_qury;

            $quer_result[$i] = $this::QuerDb();
            $i++; 

        } return $quer_result;
    }
    // функция отправки SQL запроса и получения результата
    public function QuerDb(){

        $quer = self::$quer;
        $i = 0;
        $j = 0;
       // запускаем каждый запос к БД для получения отдельной переменной от каждого запроса
        foreach ($quer as $key => $value) {
            # code...
            $connection = $this->DB_Conect();
            $res = mysqli_real_query($connection, $value);
            $result = mysqli_store_result($connection);
              
            // получение информации о сторлбцах имена столбцов
            while ($info_colonka = mysqli_fetch_field($result)) {
                    
                $name_colum[$j] = $info_colonka->name;
                $j++;
            }

            // получение результата
            $mas_db[$i] = $name_colum;
            while($row=mysqli_fetch_row($result)){
                $i++;
                $mas_db[$i] = $row;
            }
                
        }       

        self::$quer_resultat=$quer_resultat;
        return $mas_db;
    }

	static public function bdConnect()
	{
	// $connection = new PDO(dsn:"mysql:host=$server;dbname=$bd_name", $user, $password);
        
        $quer = "SHOW DATABASES";
        $obj = new DB;
        $connection = $obj->DB_Conect(); 
//		
            $res = mysqli_multi_query($connection, $quer);
            $result = mysqli_use_result($connection);
            $i=0;
            while($row = mysqli_fetch_row($result)){
                $i++;
                $mas_db[$i] = $row[0];
            }
//        
        
       
		return $mas_db;
	}

    public function ShowTable()
    {
        $obj = new DB;
        $connection = $obj->DB_Conect();
        //
        $quer = "SHOW TABLES";
        $res = mysqli_multi_query($connection, $quer);
        $result = mysqli_use_result($connection);
        $i=0;
            while($row = mysqli_fetch_row($result)){
//                var_dump($row);
                $i++;
                $mas_db[$i] = $row[0];
            }
        return $mas_db;
        
    }
    
    
}
?>