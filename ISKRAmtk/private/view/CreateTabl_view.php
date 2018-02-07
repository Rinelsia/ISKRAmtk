<div class="col-9 cont1">
<div class="">
	<p>Здесь будет прогружаться список таблиц. Создать отдельный файл загрузки таблиц и их управление, добавление и удаление информации в зависимости от баз данных</p>
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
</div>
<div class="">
	<form action="" method="post">      
      <input type="text" name="tabl_create" value="CREATE TABLE ">      
      <input type="submit" value="Создать таблицу ввести любой SQL запрос">
  </form>
</div>
<div>
    <form method="post">
        <table border="1px">
        <?php         
         foreach ($arr_tabl as $key => $value){
             echo "<tr><td>".$value."</td><td><input type='checkbox' name='tabl".$key."' value='SELECT * FROM ".$value.";'></td></tr>";
         }      
        ?>
    </table>
    <input type="submit" name="" value="выбрать">
    </form>
</div>
<div>
  
    <?php    
      
      foreach ($quer_result as $key => $value) {

        echo "<br><br> ..... таблица $key ";       

        echo "<table border='1px'>";
        for ($i=0; $i < count($value); $i++) { 
          $val = $value[$i];
          echo "<tr>";          
          if (gettype($val)==string) {
            # code...
            echo "значение";
            var_dump($val);
          }else{ 
            for ($j=0; $j < count($val); $j++) { 
              # code...
              echo "<td>".$val[$j]."</td>";            
            }
            
          }
          echo "<tr>";          
      }
      echo "</table>";
      }
    ?>
  
</div>
</div>