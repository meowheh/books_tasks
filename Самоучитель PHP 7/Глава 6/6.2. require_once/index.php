<?php
    /*Задание 6.2: Используя константы и обслуживающие их функции, добейтесь от конструкции require поведения require_once. Иными словами при много кратном включении PHP-файла, например, с классом Point, код во включаемом файле должен выполниться только один раз*/
    //подключаем в первый раз класс Point
    require("Point.php");
    //создаем объект
    $point = new Point(1,5);
    //выводим его значение на экран
    echo $point->toStr()."<br>";
    //пытаемся подключить файл во второй раз
    require("Point.php");

