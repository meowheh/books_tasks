/*Задание: напишите функцию arrayToList, которая строит список по структуре 
{value, rest: { value, rest : {...}..rest: null}..}, если передать функции массив в качестве аргумента.
Напишите функцию listToArray, создающую массив из списка.
Напишите вспомогательную функцию prepend, принимающую элемент и список и создающую новый список, в котором
заданный элемент добавлен в начало исходного списка.
Создайте функцию nth, принимающую список и число и возвращающую элемент, находящийся в заданной позиции в этом списке 
(0 - первый элемент) или undefined, если элемента в заданной позиции не существует.
Напишите рекурсивную версию функции nth.  */

//Функция преобразования массива в список
function arrayToList(array)
{
	let list = null;  //инициализация списка результата
	/*цикл с последнего элемента массива к первому, так как из функции список будет возвращаться
	в обратном порядке: в первой итерации в rest будет null, что обозначает конец списка*/
	for(let i = array.length-1; i >= 0; i--)
	{
		//создание объекта list с полями value и rest, которые хранят значение и следующий объект соответственно
		list = {value: array[i], rest: list}
	}
	return list;
}
//Функция преобразования  списка в массив
function listToArray(list)
{
	let array = [];  //инициализация массива результата
	//цикл по списку, пока он не закончится - конец списка определяется null значением поля rest.
	for(let cur = list; cur!= null; cur = cur.rest)
	{
		//добавление значения списка в массив
		array.push(cur.value);
	}
	return array;
}
//функция добавления значения el в начало списка list
function prepend(el, list)
{
	/*возвращает объект со значением el и указывает на список list,
	и таким образом становится в начале списка list*/
	return {value: el, rest: list};
}
//функция определения значения списка list по порядковому номеру n
function nth(list, n)
{
	//инициализируем текущую позицию списка первым элементом до начала цикла
	let cur = list;
	//цикл по элементам списка, пока он не достигнет n-ой позиции или своего конца
	for(let i = 0; cur != null && i < n; cur = cur.rest, i++);
	//если найденный элемент не null - n не превысило количество элементов списка и список не пустой - возвращаем значение элемента
	if (cur != null) 
		return cur.value;
	//иначе возвращаем undefined
	else 
		return undefined;
}
//рекурсивная функция определения значения списка list по порядковому номеру n
function nthRecurse(list, n)
{                 
	//если список null - n превысило количество элементов списка или список пустой - возвращаем undefined
	if(!list)
		return undefined;
	//если берем начальный элемент, то сразу возвращаем его значение
	if (n == 0)
		return list.value;
	//иначе переходим к следующему элементу и отбрасываем текущий из рассмотрения, уменьшая порядковый номер на 1
	return nthRecurse(list.rest,n-1);
}
console.log(arrayToList([10, 20]));
// → {value: 10, rest: {value: 20, rest: null}}
console.log(listToArray(arrayToList([10, 20, 30])));
// → [10, 20, 30]
console.log(prepend(10, prepend(20, null)));
// → {value: 10, rest: {value: 20, rest: null}}
console.log(nth(arrayToList([10, 20, 30]), 1));
// → 20
console.log(nthRecurse(arrayToList([10, 20, 30]), 1));
// → 20