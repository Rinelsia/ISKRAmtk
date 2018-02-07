function puView(){
    var id1 = document.getElementById("id1");
    var id2 = document.getElementById("id2");
    var id3 = document.getElementById("id3");
    
    id1.onclick = generateViewDb();
}
function generateViewDb(){
    var content = document.getElementById("content");
    content.innerHTML = '<form action="" name="DB" method="post">                <input type="text"><input type="button" value="Кнопка">                <button id="select-DB">выбрать базу данных</button></form>'
}
puView();