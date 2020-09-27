<!DOCTYPE html>
<html>  
    <head>
        <!--Настраиваем в заголовке html страницы кодировку текста для корректного вывода кириллицы !-->
        <meta charset="utf-8">
    </head>
    <body>
    <?
        require_once 'createFiles.php';
        if(extensionsFile("extensions.txt") && constantsFile("constants.txt")){
            echo 'Файлы constants.txt и extensions.txt успешно созданы в корневом каталоге';
        }
        else {
            echo 'Файлы constants.txt и extensions.txt не удалось создать в корневом каталоге';
        }
    ?>
    </body>
</html>