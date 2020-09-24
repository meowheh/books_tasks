<?
//функция записи в файл fileName строки str
//вызывается стандартная функция file_put_contents, которая возвращает false, если произошла ошибка
function write($fileName, $str){
    return file_put_contents($fileName,$str);
}