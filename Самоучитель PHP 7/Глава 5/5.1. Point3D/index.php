<!--Задание 5.1: Создайте альтернативный класс Point, объект которого моделировал бы точку в трехмерном декартовом пространстве. 
В документации найдите и изучите функцию sqrt() для вычисления квадратного корня. 
Создайте скрипт, который, используя объекты класса Point, вычислял бы расстояние между двумя точками пространства !-->
<!DOCTYPE html>
<html>  
    <head>
        <!--Настраиваем в заголовке html страницы кодировку текста для корректного вывода кириллицы !-->
        <meta charset="utf-8">
    </head>
    <!-- В теле html страницы устанавливаем ориентацию по центру !-->
    <body><center>
         <div>
             <!-- Вставка php скрипта, который выполнится, если будет нажата кнопка OK !-->
            <?php 
                //Подключаем класс Point3D для использования
                require_once 'Point3D.php';
                //Если кнопка ВЫЧИСЛИТЬ была нажата
                if(isset($_POST["button"])){
                    //создаем объекты pointA и pointB, указав координаты, которые передаются через строки ввода
                    $pointA = new Point3D($_POST['aX'],$_POST['aY'],$_POST['aZ']);
                    $pointB = new Point3D($_POST['bX'],$_POST['bY'],$_POST['bZ']);
                    //Вычисляем расстояние между двумя точками, sqrt - функция извлечения квадратного корня
                    $distance = sqrt(($pointB->x - $pointA->x)*($pointB->x - $pointA->x) +
                    ($pointB->y - $pointA->y)*($pointB->y - $pointA->y) + ($pointB->z - $pointA->z)*($pointB->z - $pointA->z));
                    //флаг выполнения скрипта
                    $flag = true;
                }
            ?>
        </div>
        <!--Выводим текст на html страницу !-->
        Введите координаты точек:<br><br>
         <!--Выводим форму для ввода данных !-->
        <form method="POST">
            <!--Выводим поля для ввода координат точек A и B, их значения регулируются php скриптом: если до этого
            кнопка ВЫЧИСЛИТЬ запускалась - флаг выполнения скрипта будет истинен - а значит нужно сохранить значение с прошлого выполнения,
            по умолчанию значение у всех полей координат 0. step = "any" позволяет вводить вещественые числа в качестве координат !-->
            <div>
             A: (<input type="number" name="aX"  style="width:40px" value = "<?=$flag? $pointA->x:0?>" step = "any"/>;
             <input type="number" name="aY"  style="width:40px" value = "<?=$flag? $pointA->y:0?>" step = "any"/>;
             <input type="number" name="aZ"  style="width:40px" value = "<?=$flag? $pointA->z:0?>" step = "any"/>)
             </div> <br>
             <div>
            B: (<input type="number" name="bX"  style="width:40px" value = "<?=$flag? $pointB->x:0?>" step = "any"/>;
             <input type="number" name="bY"  style="width:40px" value = "<?=$flag? $pointB->y:0?>" step = "any"/>;
             <input type="number" name="bZ"  style="width:40px" value = "<?=$flag? $pointB->z:0?>" step = "any"/>)
            </div>
            <br>
            <!-- Вывод кнопки OK с названием button!-->
            <input type="submit" name = "button" value="ВЫЧИСЛИТЬ">
            <br>
        </form>
        <!--Вывод надписи с результатом вычисления расстояния между двумя точками !-->
        <? //если скрипт был запущен - выводим distance
        if($flag)
         echo "<h3>Расстояние между точками A и B: $distance</h3>" ?>
    </center></body>
</html>