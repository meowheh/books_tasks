<?
    //функция, открывающая файл с именем fileName, вызывает стандартную функцию file_get_contents, которая возвращает 
    //строку с результатом или false - если такого файла нет
    function read($fileName){
        return file_get_contents($fileName);
    }