/*Задание: напишите функцию deepEqual, которая принимает два значения и возвращает true,
только если эти объекты имеют одинаковое значение или являются объектами с одинаковыми свойствами
и значения свойств равны при сравнении с рекурсивным вызовом deepEqual. */

//Функция глубокого сравнения
function deepEqual(x,y)
{
//Если значения - не стандартный тип данных
  if (typeof(x) == "object" && typeof(y) == "object")
	{
		/* нужно сразу выкинуть false, если хотя бы один из объектов null*/
		if (!x || !y)
			return false;
		//Узнаем ключи объектов x и y
		let keysX = Object.keys(x);
		let keysY = Object.keys(y);
		//Если у объектов разная длина ключей, то это сразу false
		if(keysX.length != keysY.length) 
			return false;
		//цикл по каждому ключу объектов
		for(let each of keysX)
		{
			/*рекурсивно вызываем функцию, если в ключе простое значение, то сразу узнаем результат,
			иначе условие снова перекинет сюда, пока не дойдем до простого значения*/
			
			if(!deepEqual(x[each],y[each])) //есть хотя бы одно различие между элементами - объекты не равны
              return false;
            
		}
		//цикл не нашел различия - объекты имеют одинаковые значения
		return true;
	}
   //Если значения x и y одинаковые, то возвращаем true
  else if(x === y)
    return true;
	
}

let obj = {here: {is: "an"}, object: 2};
console.log(deepEqual(obj, obj));
// → true
console.log(deepEqual(obj, {here: 1, object: 2}));
// → false
console.log(deepEqual(obj, {here: {is: "an"}, object: 2}));
// → true