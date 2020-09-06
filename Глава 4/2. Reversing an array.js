/*Задание: напишите две функции reverseArray и reverseArrayInPlace. 
Первая функция reverseArray принимает массив в качестве аргумента и создает новый массив,
содержащий те же элементы в обратном порядке.
Вторая, reverseArrayInPlace, преобразовывает массив, заданный в качестве аргумента, меняя порядок
следования его элементов на обратный.  */

//Функция, меняющая содержимое массива array местами, возвращая новый массив
function reverseArray(array)
{
	let result = [];     //инициализация нового массива результата
	
	//цикл по всему массиву с последнего элемента к начальному
	for(let i = array.length-1; i >= 0; i--)
	{
		//добавление текущего элемента в массив результата
		result.push(array[i]);
	}
	return result;
}
//Функция, меняющая содержимое массива array местами, изменяя этот же массив
function reverseArrayInPlace(array)
{
	let last = array.length-1;  //находим индекс последнего элемента массива
	/*цикл по половине длины массива, 
	так как сразу происходит обмен крайних элементов массива с начала и конца*/
	for(let j = 0; j <= last/2; j++)
	{
		let current = array[j];   //сохраняем j значение массива
		array[j] = array[last-j]; //меняем j-ое значение на last-j
		array[last-j] = current;  //меняем значение last-j позиции на старое значение позиции j
	}
}

console.log(reverseArray(["A", "B", "C"]));
// → ["C", "B", "A"];
let arrayValue = [1, 2, 3, 4, 5];
reverseArrayInPlace(arrayValue);
console.log(arrayValue);
// → [5, 4, 3, 2, 1]