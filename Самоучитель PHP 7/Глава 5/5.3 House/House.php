<!--Требует промоделировать много квартирный дом. Какие классы  объекты вы использовали бы для этого? !-->
<?php
    //подключаем класс подъезда
    require_once "Porch.php";
    //класс дома
    class House{
        private $arrayOfPorches = array();   //массив подъездов
        private $adress;                     //адрес дома
        //конструктор дома по адрессу и массиву подъездов
        public function __construct($adress, $arrayOfPorches = []){
            $this->adress = $adress;
            $this->arrayOfPorches = $arrayOfPorches;
        }
        //деструктор освобождает память для массива подъездов
        public function __destruct()
        {
            unset($this->arrayOfPorches);
        }
        //преобразование данных о доме в строку
        public function toStr(){
            $countOfPorches = $this->countOfPorches;
            $str = $this->adress . ", ";
            //перебираем все подъезды дома и добавляем данные в строку str
            for($porch = 0; $porch < $countOfPorches; $porch++){
                $currentPorch = $this->arrayOfPorches[$porch];
                $str .= $currentPorch->toStr();
            }
            return $str;
        }
        //получение доступа к полям
        public function __get($property){
            //адреса
            if($property == "adress"){
                return $this->adress;
            }
            //массива подъездов
            else if($property == "arrayOfPorches"){
                return $this->arrayOfPorches;
            }
            //виртуальному полю количества подъздов
            else if($property == "countOfPorches"){
                return count($this->arrayOfPorches);
            }
            else return null;
        }
        //изменение значения поля адреса
        public function __set($property,$value){
            if($property == "adress" && gettype($value) == "string" && !empty($value)){
                $this->adress = $value;
            }
        }
        //добавить подъезд
        public function addPorch($obj){
            if(gettype($obj) == "object"){
                //если такового еще нет - добавляем в массив
                if(array_search($obj, $this->arrayOfPorches) == false)
                    $this->arrayOfPorches[] = $obj;
            }
            else {
                //просматриваем по циклу каждую квартиру этажа 
                $flag = true;
                for($i = 0; $i < $this->countOfPorches && $flag; $i++){
                    if($this->arrayOfPorches[$i]->numOfPorch == $obj) 
                        $flag = false;
                }
                //и если не найдем квартиру с нужным номером - добавляем новый объект подъезда с номером obj без этажей
                if($flag) 
                    $this->arrayOfPorches[] = new Porch($obj);
            }
        }
        //удалить подъезд
        public function removePorch($obj){
            if(gettype($obj) == "object"){
                 //если такой подъезд есть - находим ключ с таким объектом
                 if($deleteKey = array_search($obj, $this->arrayOfPorches) != false)
                 //удаляем объект из массива по найденному ключу
                 unset($this->arrayOfPorches[$deleteKey]);
             }  
            //Если указан только номер подъезда
            else {
             //просматриваем по циклу каждый номер подъезда
             $flag = true;
             for($i = 0; $i < $this->countOfPorches && $flag; $i++){
                 if($this->arrayOfPorches[$i]->numOfPorch == $obj) 
                     $flag = false;
             }
             //и если найдем нужный подъезд - удаляем ее с массива
             if(!$flag) 
                 unset($this->arrayOfPorches[$i]);
            }
        }


}