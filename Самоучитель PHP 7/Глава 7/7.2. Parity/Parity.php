<?
//функция определения четное ли число num
    function parity($num){
        //инициализируем переменную результата значение false
        $res = false;
        //если младший бит числа num равен 0, то число четное, иначе - нечетное
        //младший бит числа num получаем путем использования побитового И с единицей
        if(($num & 1) == 0) 
            $res = true;
        //возвращаем результат
        return $res;
    }