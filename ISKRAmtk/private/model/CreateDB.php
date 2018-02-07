<?php
    class CreateDB 
    {
        

        public function Select_DB(){
            $adm=$_POST["SelectDB"];
            $adm_arr = array('SelectDB' => $adm);
            $obj_CreateDB = new CreateDB;

            if ($adm) {            
                $adm_json = json_encode($adm_arr);
                echo "string ".$adm_json."//////";
                file_put_contents("private/controller/admin.json",$adm_json);
                $adm_dbs = $adm;
                // $this->$adm_db_creat=$adm;

            }else{
                $adm = file_get_contents("private/controller/admin.json");
                $adm_json = json_decode($adm);
                $adm_dbs = $adm_json->{"SelectDB"}; 
                // echo "string читает --".$adm_dbs."--";
                // var_dump($adm_dbs);                
            }
        return $adm_dbs;

        }
        // функция выбора базы данных и создания
        static function DbCreate(){
            // $inf=apc_sma_info();
            // $inf=apcu_cashe_info();
           
            // $url_json_obj = new UrlJson;
            // $adm_db_name = $url_json_obj->$adm_db;
            // var_dump($adm_db_name);
            $obj_CreateDB = new CreateDB;
        
            CreateDB::Select_DB();

            // $val = $_POST["SelectDB"]; //рассчет в url.php
            $create =$_POST["bs"];
            $drop =$_POST["DropDB"];            
            // var_dump($val);
            
            // if ($val){
            //     $quer = "USE ".$val."";
            // }else
             if($create){
                $quer = "CREATE DATABASE ".$create."";
            } else{
                // $quer = "DROP DATABASE ".$drop."";
            }
            $obj = new DB;
                $connection = $obj->DB_Conect();
                if(!$connection){
                echo "Ошибка подключения";
                }else {            
                $res = mysqli_multi_query($connection, $quer);
                    if ($res){
                        $result = $value;
                    }
//               
                    // var_dump($res);
            }
            
//            $i=0;
//            while($row = mysqli_fetch_row($result)){
////                var_dump($row);
//                $i++;
//                $mas_db[$i] = $row[0];
//            }
            return $result;
        
        
        
        }
        
    }
// класс редактирования таблиц
    class RedTable extends CreateDB
    {
        // $create = $_POST["tabl_create"];

        // if ($create) {
        //     # code...
        //     // $quer = "CREATE TABLE".$create;
        // }
        
    }
?>