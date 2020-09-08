/*Задание: напишите функцию, которая вычисляет доминирующее направление письма в строке текста. 
Доминирующее направление - это направление большинства символов, которые принадлежат какому-либо шрифту. */

//Функция, возвращающая направление письма, которое преобладает в строке
function dominantDirection(text) {
/*Вычисляем количество символов в соответствии каждому направлению письма direction
с помощью функции countBy*/
  let scripts = countBy(text, char => {
//для этого используем функцию characterScript, которая определяет к какому языку относится символ
    let script = characterScript(char.codePointAt(0));
	//если это буква или иероглиф узнаем направление письма direction, иначе присваиваем "none"
    return script ? script.direction : "none";
//убираем из полученного объекта {направление, количество} все элементы с направлением "none"
 }).filter(({name}) => name != "none");
  //возвращаем направление с наибольшим количеством, сравнивая каждый элемент с последующим
  //с помощью функции reduce
  return (scripts.length == 1) ? scripts[0].name : scripts.reduce((x,y) => (x.count > y.count) ? x.name:y.name);
}
console.log(`Доминирующий тип направления в строке "Hello!": ${dominantDirection("Hello!")}`);
// → ltr
console.log(`Доминирующий тип направления в строке "Hey, مساء الخير !": ${dominantDirection("Hey, مساء الخير !")}`);
// → rtl
let str = prompt("Введите строку на разных языках: ");
console.log(`Доминирующий тип направления в строке "${str}": ${dominantDirection(str)}`);

