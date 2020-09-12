<!--Задание 5.2: Создайте класс для комплексных чисел !-->
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
             //Подключаем файл с классом Complex
                require_once("Complex.php");
                //Если кнопка вычисления нажата
                 if(isset($_POST["button"])){
                     //создаем два объекта класса комплексных чисел, вещественные и мнимые части получаем через поля формы
                    $z1 = new Complex($_POST["re1"],$_POST["im1"]);
                    $z2 = new Complex($_POST["re2"],$_POST["im2"]);
                    //получаем тип операции
                    $operation = $_POST["operation"];
                    //складываем числа z1 и z2 и возвращаем результат в объект result
                    if($operation == "+"){
                        $result = $z1->plus($z2);
                    }
                    //умножаем два числа z1 и z2 и возвращаем результат в объект result
                    if($operation == "x"){
                        $result = $z1->mult($z2);
                    }
                    //делим z1 на z2 и получаем результат в объект result
                    if($operation == "/"){
                        $result = $z1->div($z2);
                    }
                    //флаг выполнения скрипта
                    $flag = true;
                }
            ?>
        </div>
        <!--Выводим текст на html страницу !-->
        Введите два числа:<br><br>
         <!--Выводим форму для ввода данных !-->
        <form method="POST">
            <div>
            <!--Выводим поля для ввода комплексных чисел z1 и z2, их значение определяется скриптом php, который выставляет прошлое значение, если была нажата кнопка вычисления, или по умолчанию 0, step = "any" позволяет вводить вещественные числа !-->
             z<sub>1</sub> = <input type="number" name="re1"  style="width:40px" value = "<?=$flag? $_POST["re1"]:0?>" step = "any"/> + 
             <input type="number" name="im1"  style="width:40px" value ="<?=$flag? $_POST["im1"]:0?>" step = "any"/> i
             </div><br>
             <div>
            z<sub>2</sub> = <input type="number" name="re2"  style="width:40px" value = "<?=$flag? $_POST["re2"]:0?>" step = "any"/> +
             <input type="number" name="im2"  style="width:40px" value = "<?=$flag? $_POST["im2"]:0?>" step = "any"/> i
            </div><br>
            <div>
                <!--Выводим выпадающий список с вариантами операций между z1 и z2 !-->
                z<sub>1</sub> 
                <select name = "operation">
                    <!--С помощью selected определяется, какой из вариантов будет выбран. По умолчанию до нажатия кнопки выбирается +. После нажатия кнопки возвращается прошлый выбор пользователя. Это реализуется с помощью скрипта php !-->
                    <option value ="+" <?echo ($_POST["operation"] == "+" && $flag || !$flag) ? "selected":"" ?>>+</option>
                    <option value ="x" <?echo ($_POST["operation"] == "x" && $flag) ? "selected":"" ?>>x</option>
                    <option value ="/" <?echo ($_POST["operation"] == "/" && $flag) ? "selected":"" ?>>/</option>
                </select>
                z<sub>2</sub>
            <!-- Вывод кнопки вычисления с названием button!-->
            <input type="submit" name = "button" value=" = ">
            </div>
            <br>
        </form>
        <!--Вывод надписи с результатом вычисления операции !-->
        <? 
        if($flag)
        //result будет null только в том случае, если было произойдено деление на ноль, иначе выводим результат
        if(!is_null($result))
            echo  "<h3>Результат: (".$z1->toStr().") ". $operation . " (". $z2->toStr().") = ".$result->toStr()."</h3>";  
        else if($operation == "/") 
            echo "<h3>Ошибка деления на ноль!</h3>";
        ?>
    </center></body>
</html>