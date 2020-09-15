<?php
    require_once "House.php";
    //создаем объект двухкомнатной квартиры с номером 1, владелец Иван Иванов
    $myApartament = new Apartament(1,2,["Иван Иванов"]);
    //создаем первый этаж, который будет включать квартиру myApartament и трехкомнатную квартиру с номером 2 Дмитрия Ивановича
    $myFloor = new Floor(1,[$myApartament, new Apartament(2,3,["Дмитрий Иванович"])]);
    //создаем первый подъезд с первым этажем - объект myFloor, и со вторым этажем с однокомнатной квартирой 3 Володи
    $myPorch = new Porch(1,[$myFloor, new Floor(2,[new Apartament(3,1,["Володя"])])]);
    //создаем объект дома с номером 43 и подъездом myPorch
    $myHouse = new House("д. 43",[$myPorch]);
    //Вывод информации о доме
    echo $myHouse->toStr();