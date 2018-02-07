        <div id="content" class="col-9 cont1">
<!--            <script>puView();</script>-->
<!--           форма создание удаление баз данных-->
            <form method="post">
                <input  name="bs" type="text">
                <input type="submit" value="Создать базу данных"> 
            </form>
            <form action="" method="post">
               <select name="SelectDB">
                  
                   <?php
                      //$arr_dbs находится в url.php подключение бд           
                    foreach ($arr_dbs as $key => $value){
                        echo "<option value=".$value.">".$value."</option>";
                    }
                   ?>
                   
                </select>
                <input type="submit" value="выбрать базу данных">            
            </form>
            <form action="" method="post">
                    <button type="submit" name="DropDB" value="<?php $val = $_POST["SelectDB"];
                    echo $val ?>"> Удалить БД</button>
            </form>  
            <div>
                <p> Выбрана база данных</p>
                <p><?php 
                        $SelectDb = $_POST["SelectDB"];
                        echo $SelectDb
                    ?></p>
            </div>
            
            <table border="1px">                
                    <?php 
                        
                        foreach ($arr_dbs as $key => $value){
                            echo "<tr><td>".$value."</td></tr>";
                        }
                    ?>
                
            </table>
            
        </div>
    </content>   