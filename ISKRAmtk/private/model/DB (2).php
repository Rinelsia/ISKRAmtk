<?php
// namespace dat;

class DB
{
	public static $quer='';
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
        // echo "$db_name=(".$db_name."),,,....";
        // var_dump($db_name);

        
		if($connection = mysqli_connect($server, $user, $password, $bd_name)){
            return $connection;
            
		}else if($connection = mysqli_connect($server, $user, $password)){
            return $connection;
        }else{
            echo "Ошибка подключения";
        }
    }
//просчет обработки пост запросов
    public  function quering(){
             foreach ($_POST as $key => $value) {
            # code...
            self::$quer=$value.";";
            $obj = $this::QuerDb();
            // echo "<br> Отображение obj --";
            // var_dump($obj);
            $quer_result = (object) array($key => $obj);
            echo "///////////////////////////<br>";
            var_dump($quer_result);
            echo "<br>//////////////quer////////////<br>-----";
            var_dump(self::$quer);           

        } return $quer_result;
        }
    
    public function QuerDb(){
       
        // $quer = "SELECT * FROM hotelroom;";
        $quer = self::$quer;
        echo "<br>Отображение quer ---";
        var_dump($quer);
        // $quer = 0;//в эту переменную пойдет полный запрос к базе данных
        // $obj = new DB;
        $connection = $this->DB_Conect();
        $res = mysqli_real_query($connection, $quer);

        // $qwer = mysqli_query($connection, $quer);
        //  echo "<br> Отображение qwer  --";
        //  var_dump($qwer);

        echo "<br> Отображение res --";
        var_dump($res);
        // echo "<br>----Отображение FETCH<br>";
        // var_dump(mysqli_fetch_assoc($qwer));
        // mysqli_free_result($qwer);
        $result = mysqli_store_result($connection);

        echo "<br>Отображение  result --";
        var_dump($result);

        echo "<br>---Отображение  row -----+++++++++++++";
        $row=mysqli_fetch_array($result);
        var_dump($row);
        var_dump(mysqli_next_result($connection));
      
        
            
            // foreach ($row as $key => $value) {
                
            //     $mas_db->{$key}=$value;
            // }
           

        
        
        // $j=0;
        // do{
        //     # code...
        //     $j++;
        //     $i=0;
        //     while($row = mysqli_fetch_row($result)){
        //         $i++;
        //         $mas_db[$i] = $row;
        // }
        // mysqli_free_result($result);

        // }while (mysqli_next_result($connection));        
       

        
        
        echo "<br>------+++++++mas_db++++++++++++ --";
        var_dump($mas_db);
        return $mas_db;
    }



    //      do {
    //     /* получаем первый результирующий набор */
    //     if ($result = mysqli_store_result($link)) {
    //         while ($row = mysqli_fetch_row($result)) {
    //             printf("%s\n", $row[0]);
    //         }
    //         mysqli_free_result($result);
    //     }
    //     /* печатаем разделитель */
    //     if (mysqli_more_results($link)) {
    //         printf("-----------------\n");
    //     }
    // } while (mysqli_next_result($link));







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