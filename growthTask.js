/*Задание: Вова выше Максима на 10 сантиметров, Максим выше Дениса на 25 сантиметров, а Егор ниже Дениса на 5 сантиметров. Задайте рост Дениса из консоли, чтобы при это сразу вывелся рост Максима, Вовы и Дениса. Осуществить проверку корректности роста Дениса */

//Функция вычисляющая рост ребят по заданию, в аргументе принимает рост Дениса в сантиметрах
function calcGrowth(growthDenis){
    //инициализируем массив, который будет хранить рост ребят
    let growths = [];
    //Вычисляем рост Максима: Максим выше Дениса на 25 сантиметров
    let growthMax = growthDenis + 25;
    //Добавляем в массив объект со значением имени name и роста growth Максима
    growths.push({name: "Максим",growth: growthMax});
    //Вычисляем рост Вовы: Вова выше Максима на 10 см
    let growthVova = growthMax + 10;
    //Добавляем в массив объект со значением имени name и роста growth Вовы
    growths.push({name: "Вова", growth: growthVova});
    //Вычисляем рост Егора: Егор ниже Дениса на 5 см
    let growthEgor = growthDenis - 5;
    //Добавляем в массив объект со значением имени и роста Егора
    growths.push({name: "Егор", growth: growthEgor});
    //Добавляем в массив объект со значением имени и роста Дениса
    growths.push({name: "Денис",growth: growthDenis});
    //возвращаем массив
    return growths;
}
//инициализация роста Дениса
let growthDenis = 0;
//инициализация вспомогательной строки для текста в prompt
let strMessage = null;
//начинаем цикл с пост-условием, который будет продолжать выполняться пока истинно условие в while
do{
    //если строка пустая - цикл проходит в первый раз и пользователь ввел рост Дениса верно
      if(strMessage == null)
      //записываем в строку указание, что нужно ввести рост Дениса
        strMessage = "Введите рост Дениса:";
    //открываем диалоговое окно для ввода роста Дениса с текстом strMessage
      let str = prompt(strMessage)
    /*Если рост Дениса введен корректно: это число - сразу текстовый тип переводим в число: parseFloat вернет NaN, если
    будет введена символьная строка, и это число не меньше 100 см и не больше 250 см*/
    if(!isNaN(growthDenis = parseFloat(str)) && growthDenis > 100 && growthDenis < 250)
        {
            //Вызываем функцию calcGrowth и возвращаем массив объектов с именами и ростами 
            let growths = calcGrowth(growthDenis);
            //По каждому элементу массива выводим рост для каждого из ребят
            for(let i = 0; i < growths.length; i++){
                console.log(`${growths[i].name}: ${growths[i].growth}`);
            }
        }
    else //если рост Дениса введен некорректно, то в строку записываем просьбу ввести корректный рост
        strMessage = "Введите корректный рост Дениса! (100 < рост < 250 см)";
//если пользователь ввел некорректные данные, повторяем цикл
}while(isNaN(growthDenis) || growthDenis <= 100 || growthDenis >= 250);