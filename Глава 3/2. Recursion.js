/*Задание: Определите рекурсвную функцию isEven, определяющую четность положительного числа, исходя из свойств:
	* Ноль четный;
	* Единица нечетная;
	* Четность любого другого числа N совпадает с четностью N-2.
Функция должна принимать один параметр (положительное число) и возвращать логическое значение. 
Дополнить эту функцию для отрицательных целых чисел */

//Функция, определяющая четность целого числа x
function isEven(x){
	//Если число отрицательное - меняем его знак на противоположный
	if (x < 0) 
		x = -x;
	//Ноль четный
	if (x == 0) 
		return true;
	//Единица нечетная
	if (x == 1)
		return false;
	//Отнимаем -2, пока не получим 0 или 1
	return isEven(x-2);
}
//вывод типовых значений в консоль
console.log(`isEven(50) = ${isEven(50)}`);
// → true
console.log(`isEven(75) = ${isEven(75)}`);
// → false
console.log(`isEven(-1) = ${isEven(-1)}`);
// → false
//Используем инструмент Node.js для осуществления чтения из консоли
const readline = require('readline').createInterface({
	input: process.stdin,
	output: process.stdout
  })
  //Запрашиваем у пользователя ввод числа
    readline.question(`Enter number: `, (x) => {
	//преобразуем введенные данные из строки в число
	let num = parseInt(x);
	//Вызываем функцию isEven с введенным числом и выводим результат в консоль
	console.log(`isEven(${num}) = ${isEven(num)}`);
	readline.close()
  });
