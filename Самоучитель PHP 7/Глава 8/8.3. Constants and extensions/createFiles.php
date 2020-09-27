<? /*Задание 8.3: напишите скрипт, который при вызове создает два файла: со списком всех возможных расширений extensions.txt и со списком всех предопределенных констант PHP constants.txt */
//Функция записывающая все используемые расширения в файл nameFile
function extensionsFile($nameFile){
    //с помощью функции get_loaded_extensions возвращаем массив расширений
    $extensions = get_loaded_extensions();
    //инициализируем строку текста, которую запишем в файл
    $extStr = "";
    //цикл по всем элементам массива extensions
    for($i = 0; $i < count($extensions); $i++){
        //добавляем в строку название каждого расширения
        $extStr.= $extensions[$i]."\n";
    }
    //записываем в файл nameFile полученную информацию, file_put_contents вернет false, если запись не удалась
    return file_put_contents($nameFile, $extStr);
}
//функция, записывающая все определенные константы в фаайл nameFile
function constantsFile($nameFile){
    //возвращаем массив объектов констант с помощью функции get_defined_constants
    $constants = get_defined_constants(true);
    //инициализируем строку текста, которую запишем в файл
    $constStr = "";
    //находим названия категорий констант - ключи массива объектов constants
    $categories = array_keys($constants);
    //цикл по каждому ключу 
    foreach($categories as $category){
        //записываем в строку название категории констант
        $constStr .= "$category : \n\n";
        //находим названия констант - ключи массива объектов constants для данной категории
        $namesOfConstants = array_keys($constants[$category]);
        //цикл по каждой константе
        foreach($namesOfConstants as $name){
            //записываем в строку название константы и ее значение
            $constStr .= "$name = ".$constants[$category][$name]."\n";
        }
    //записываем дополнительный отступ строки для наглядности в текстовом файле
    $constStr .= "\n";
    }
    //записываем в файл nameFile полученную информацию, file_put_contents вернет false, если запись не удалась
    return file_put_contents($nameFile,$constStr);
}