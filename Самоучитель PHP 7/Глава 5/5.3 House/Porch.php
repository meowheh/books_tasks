<?php
    //подключаем класс этажа
    require_once "Floor.php";
    //класс подъезда
    class Porch{
        private $arrayOfFloors = array();   //массив этажей
        private $numOfPorch;                //номер подъезда
        //конструктор класса подъезда с заданием его номера и массива объектов этажей
        public function __construct($numOfPorch, $arrayOfFloors = []){
            $this->numOfPorch = $numOfPorch;
                $this->arrayOfFloors = $arrayOfFloors;
        }
        //деструктор с освобождением памяти из массива этажей
        public function __destruct()
        {
            unset($this->arrayOfFloors);
        }
        //функция получения полей класса
        public function __get($property){
            //получаем номер подъезда
            if($property == "numOfPorch"){
                return $this->numOfPorch;
            }
            //получаем массив этажей
            else if($property == "arrayOfFloors"){
                return $this->arrayOfFloors;
            }
            //обращение к виртуальному полю количества этажей в подъезде 
            else if($property == "countOfFloors"){
                return count($this->arrayOfFloors);
            }
            else return null;
        }
        //можно поменять только номер подъезда, информацию об этажах менять с помощью специальных функций
        public function __set($property, $value){
            if($property == "numOfPorch" && $value > 0){
                $this->numOfPorch = $value;
            }
        }
        //преобразование даннных о подъезде в строку
        public function toStr(){
            $str = $this->numOfPorch . "к, ";
            //перебираем все этажи подъезда и добавляем о них данные в строку str
                for($floor = 0; $floor < $this->countOfFloors; $floor++){
                    $currentFloor = $this->arrayOfFloors[$floor];
                    $str .= $currentFloor->toStr();
                }
                $str .= "<br>";
            return $str;
        }
        //добавить этаж
        public function addFloor($obj){
            if(gettype($obj) == "object"){
                //если такового еще нет - добавляем в массив
                if(array_search($obj, $this->arrayOfFloors) == false)
                    $this->arrayOfFloors[] = $obj;
            }
            else {
                //просматриваем по циклу каждую квартиру этажа 
                $flag = true;
                for($i = 0; $i < $this->countOfFloors && $flag; $i++){
                    if($this->arrayOfFloors[$i]->numOfFloor == $obj) 
                        $flag = false;
                }
                //и если не найдем квартиру с нужным номером - добавляем новый объект этажа с номером obj без квартир
                if($flag) 
                    $this->arrayOfFloors[] = new Floor($obj);
            }
        }
        //удалить этаж
        public function removeFloor($obj){
            if(gettype($obj) == "object"){
                 //если такой этаж есть - находим ключ с таким объектом
                 if($deleteKey = array_search($obj, $this->arrayOfFloors) != false)
                 //удаляем объект из массива по найденному ключу
                 unset($this->arrayOfFloors[$deleteKey]);
             }  
            //Если указан только номер этажа
            else {
             //просматриваем по циклу каждый этаж подъезда 
             $flag = true;
             for($i = 0; $i < $this->countOfFloors && $flag; $i++){
                 if($this->arrayOfFloors[$i]->numOfFloor == $obj) 
                     $flag = false;
             }
             //и если найдем нужный этаж - удаляем ее с массива
             if(!$flag) 
                 unset($this->arrayOfFloors[$i]);
            }
        }

    }