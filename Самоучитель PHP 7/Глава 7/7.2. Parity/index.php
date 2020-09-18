<!--Задание 7.2: Создайте скрипт, который определял бы четность или нечетность числа только при помощи поразрядных операторов и конструкции if !-->
<!DOCTYPE html>
<html>  
    <head>
        <!--Настраиваем в заголовке html страницы кодировку текста для корректного вывода кириллицы !-->
        <meta charset="utf-8">
    </head>
    <!-- В теле html страницы устанавливаем ориентацию по центру !-->
    <body><center>
         <div>
             <!-- Вставка php скрипта, который выполнится, если будет нажата кнопка ОПРЕДЕЛИТЬ !-->
            <?php 
                //Подключаем файл с функцией определения четности числа
                require_once "Parity.php";
                //Если кнопка ВЫЧИСЛИТЬ была нажата
                if(isset($_POST["button"])){
                    //записываем в переменную num значение поля формы для ввода числа
                    $num = $_POST["num"];
                    //вызываем функцию parity определения четности числа num и записываем результат в res
                    $res = parity($num);
                    //флаг выполнения скрипта
                    $flag = true;
                }
            ?>
        </div>
        <!--Выводим текст на html страницу !-->
        Четность числа<br><br>
         <!--Выводим форму для ввода данных !-->
        <form method="POST">
            <!--Поле для ввода числа, его начальное значение регулируется скриптом, который сохраняет прошлое значение до нажатия кнопки ВЫЧИСЛИТЬ,
            а по умолчанию 1!-->
            <input type="number" name="num"  style="width:40px" value = "<?=$flag? $num:1?>" />
            <br><br>
            <!-- Вывод кнопки ВЫЧИСЛИТЬ с названием button!-->
            <input type="submit" name = "button" value="ОПРЕДЕЛИТЬ">
            <br><br>
        </form>
        <!--Вывод надписи с результатом возведения степени !-->
        <? //если скрипт был запущен
        if($flag)
        {   //если result == true, это значит, что число четное
            if($result)
                echo "<h3>Число $num четное</h3>";
            else  //иначе число нечетное
                echo "<h3>Число $num нечетное</h3>";
        }
        ?>
    </center></body>
</html>
 

