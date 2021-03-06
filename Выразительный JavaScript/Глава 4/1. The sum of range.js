/*Задание: напишите функцию range, которая принимает два аргумента start и end, и возвращает массив,
содержащий все числа от start до end включительно.
Напишите функцию sum, которая принимает массив чисел и возвращает их сумму.
Измените функцию range так, чтобы она принимала необязательный третий аргумент, 
который указывал бы значение шага, используемое при построении массива. Если шаг не задан, элементы увеличиваются на единицу. */

//Функция, возвращающая массив чисел от start до end включительно с шагом step по умолчанию 1
function range(start, end, step = 1)
{
	let array = [];  //инициализация массива результата
	/*Определяем сколько раз нужно проходить через цикл: 
		отнимаем из большего числа меньшее, делим на модуль шага и округляем*/
	let dx = 1+((start > end) ? Math.floor((start-end)/(-step)):
								Math.floor((end-start)/step))
	/*Цикл, добавляющий в array числа от start до end с шагом step, где
		i - счетчик количества итераций, pos - текущее добавляемое значение*/
	for(let i =0, pos = start; i < dx;array.push(pos), i++, pos+=step);
	return array;
}
//Функция, возвращающая сумма элементов массива array
function sum(array)
{
	let res = 0;  //инициализация суммарного значений
	
	/*цикл по каждому элементу массива array
	с прибавлением к res значения текущего элемента each*/
	for(let each of array)
	{
		res += each;
	}
	return res;
}
//инициализируем массив результата
let arr = [];
//инициализируем вспомогательную строку для вывода сообщения
let messageStr = null;
//устанавливаем флаг продолжения цикла
let flag = true;
//выполняем цикл, пока пользователь не введет корректные данные - flag остается true
do{
	//если проходим в первый раз
	if(messageStr == null)
	//просто записываем в строку информацию о вводе данных
		messageStr = "Введите начало, конец и шаг (опционально) массива (пример: 1, 10, 3 или 1, 10): ";
	//просим пользователя ввести данные, строка с результатом вернется в str
	let str = prompt(messageStr);
	//если пользователь не нажал отмену
	if(!(str === null)){
		//разбиваем строку на массив по разделителям , ; и пробел
		str = str.split(/[\s,;]+/);
		//инициализируем начало, конец и шаг массива
		let begin = 0;
		let end = 0;
		let step = 0;
		//если пользователь ввел начало, конец и шаг и это все целые числа
		if(str.length == 3 &&!isNaN(begin = parseInt(str[0])) && !isNaN(end = parseInt(str[1])) && !isNaN(step = parseInt(str[2]))){
			//вызываем функцию range, которая вычислит результат и вернет в arr
			arr = range(begin,end,step);
		}
		//если пользователь ввел только начало и конец, и эти числа целые
		else if(str.length == 2 && !isNaN(begin = parseInt(str[0])) && !isNaN(end = parseInt(str[1])))
			//вызываем функция range, которая вычислит результат с шагом 1 и вернет в arr
			arr = range(begin,end);
		//если все было корректно введено 
		if(arr.length){
			//выводим массив и сумму элементов массива, которая вычисляется с помощью функции sum
			console.log(`Полученный массив: [${arr}]`);
			console.log(`Сумма элементов массива: ${sum(arr)}`);
			//флаг продолжения цикла устанавливаем в false
			flag = false;
		}
		//если что-то не так - добавляем к строке сообщения информацию
		else messageStr = "Введите корректные данные!\n" + messageStr;
	}	
	//если пользователь нажат Отмена - завершить цикл
	else flag = false;

}while(flag);
