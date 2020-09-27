<?php
//подключаем класс квартиры
    require_once "Apartament.php";
    //класс этажа
    class Floor{

        private $arrayOfApartaments = array();  //массив квартир
        private $numOfFloor;                    //номер этажа
        //конструктор, принимающий номер этажа и массив объектов квартир
        public function __construct($numOfFloor, $arrayOfApartaments = []){
            $this->numOfFloor = $numOfFloor;
            $this->arrayOfApartaments = $arrayOfApartaments;
        }
        //деструктор освобождает память под массив
        public function __destruct()
        {
            unset($this->arrayOfApartaments);
        }
        //функция получения данных о полях объекта
        public function __get($property){
            //получаем номер этажа
            if($property == "numOfFloor"){
                return $this->numOfFloor;
            }
            //получаем массив комнат
            else if($property == "arrayOfApartaments"){
                return $this->arrayOfApartaments;
            }
            //получаем доступ к виртуальному полю количества квартир на этаже
            else if($property == "countOfApartaments"){
                //возвращаем количество элементов массива
                return count($this->arrayOfApartaments);
            }
            else return null;
        }
        //можем напрямую поменять только номер этажа, для изменения квартир нужно вызывать специальные функции
        public function __set($property, $value){
            if($property == "numOfFloor"){
                $this->numOfFloor = $value;
            }
        }
        //преобразоваться в строку данные об этаже
        public function toStr(){
            $str = $this->numOfFloor . " этаж, ";
            //перебираем все квартиры этажа и добавляем данные в строку str
            for($apartament = 0; $apartament < $this->countOfApartaments; $apartament++){
                $currentApartament = $this->arrayOfApartaments[$apartament];
                $str .= $currentApartament->toStr();
            }
            $str.="<br>";
            return $str;
        }
        //добавить квартиру на этаж
        public function addApartament($obj){
            //проверяем, что добавляем объект квартиры
            if(gettype($obj) == "object"){
                //если такой квартиры еще нет - добавляем в массив
                if(array_search($obj, $this->arrayOfApartaments) == false)
                    $this->arrayOfApartaments[] = $obj;
            }
            else if($obj > 0){
                //просматриваем по циклу каждую квартиру этажа 
                $flag = true;
                for($i = 0; $i < $this->countOfApartaments && $flag; $i++){
                    if($this->arrayOfApartaments[$i]->numOfApartament == $obj) 
                        $flag = false;
                }
                //и если не найдем такую квартиру - добавим новую однокомнатную без владельца, создав объект с номером квартиры obj 
                if($flag) 
                    $this->arrayOfApartaments[] = new Apartament($obj);
            }
        }
        //удалить квартиру с этажа
        public function removeApartament($obj){
            //если указали объект квартиры
            if(gettype($obj) == "object"){
                //если такая квартира есть - находим ключ с таким объектом
                if($deleteKey = array_search($obj, $this->arrayOfApartaments) != false)
                    //удаляем объект из массива по найденному ключу
                    unset($this->arrayOfApartaments[$deleteKey]);
            }
            //Если указан только номер квартиры
            else if($obj !=0){
                //просматриваем по циклу каждую квартиру этажа 
                $flag = true;
                for($i = 0; $i < $this->countOfApartaments && $flag; $i++){
                    if($this->arrayOfApartaments[$i]->numOfApartament == $obj) 
                        $flag = false;
                }
                //и если найдем квартиру с нужным номером - удаляем ее с массива
                if(!$flag) 
                    unset($this->arrayOfApartaments[$i]);
            }
        }
    } 