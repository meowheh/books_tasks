/*Задание: напишите функцию countBs, которая принимает строку в качестве единственного аргумента
и возвращает число, показывающее, сколько больших букв "B" содержится в этой строке.
Затем напишите функцию countChar, которая ведет себя как countBs, за ислючением того, что принимает
второй аргумент, указывающий, какие именно символы нужно посчитать.
Перепишите countBs, чтобы использовать эту новую функцию. */

//Первая версия функции countBs, определяющая количество букв B в строке
/*function countBs(str)
{
	let n = 0;  //Инициализация переменной, хранящей количество вхождений буквы B в строку str
	
	//Цикл по каждому символу строки str
	for(let each of str)
	{
		//Если текущий символ - это символ B, то увеличиваем счетчик n
		if(each == "B") 
			n++;
	}
	//Возвращаем результат
	return n;
}*/
//Функция, определяющая количество вхождений символа ch в строку str
function countChar(str, ch = 'B') //если в вызове функции не указан символ ch, по умолчанию - B
{
	let n = 0;      //Инициализация счетчика
	//Цикл по каждому символу строки str
	for(let each of str)
	{
		//Если текущий символ - это символ ch, то увеличиваем счетчик n
		if(each == ch)
			n++;
	}
	//Возвращаем результат
	return n;
}
//Вторая версия функции countBs с вызовом countChar
function countBs(str)
{
	return countChar(str);
}

console.log(`countBs("BBC") = ${countBs("BBC")}`);
// → 2
console.log(`countChar("kakkerlak", "k") = ${countChar("kakkerlak", "k")}`);
// → 4
