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
      <input type="text" name="tabl_create">
      <input type="hidden" name="" value="CREATE TABLE ">
      <input type="submit" value="Создать таблицу">
  </form>

</div>
<div>
    <form method="post">
        <table border="1px">
        <?php 
        $_POST["tabl_create"]="CREATE TABLE ".$_POST["tabl_create"].";";
        $post = $_POST["tabl_create"];
        echo "post $post";
        var_dump($arr_tabl);
        $_POST["show_tables"] = "SHOW TABLES";
       foreach ($arr_tabl as $key => $value){
           echo "<tr><td>".$value."</td><td><input type='checkbox' name='tabl".$key."' value='EXPLAIN SELECT * FROM ".$value."'></td></tr>";
       }
       echo "string \n";
       var_dump($_POST);
       echo "string <br>";
       var_dump($quer_result);
        ?>
    </table>
    <input type="submit" name="" value="выбрать">
    </form>
</div>
<div>
  
</div>
</div>