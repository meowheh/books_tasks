<?php
//класс квартиры
    class Apartament{
        private $countOfRooms;              //количество комнат в квартире
        private $numOfApartament;           //номер квартиры
        private $arrayOfOwners = array();   //массив владельцев квартиры

        //конструктор класса квартиры
        public function __construct($numOfApartament, $countOfRooms = 1, $arrayOfOwners = []){
            $this->numOfApartament = $numOfApartament; 
            $this->countOfRooms = $countOfRooms;
            $this->arrayOfOwners = $arrayOfOwners;
        }
        //деструктор
        public function __destruct()
        {  //освобождаем память массива
            unset($this->arrayOfOwners);
        }
        //получение данных об свойствах объекта
        public function __get($property){
            //если обращаемся к количеству комнат
            if($property == "countOfRooms"){
                //возвращаем количество комнат
                return $this->countOfRooms;
            }
            else if($property == "numOfApartament"){
                //возвращаем номер квартиры
                return $this->numOfApartament;
            }
            else if($property == "arrayOfOwners"){
                //возвращаем массив владельцев квартиры
                return $this->arrayOfOwners;
            }
            //если обращаются к виртуальному полю количества владельцев
            else if($property == "countOfOwners"){
                //возвращаем количество владельцев
                return count($this->arrayOfOwners);
            }
            //иначе null
            else return null;
        }
        //можем поменять только номер квартиры и количество комнат, для изменения массива владельцев - использовать специальные функции
        public function __set($property, $value){
            if($property = "numOfApartament" && $value){
                $this->numOfApartament = $value;
            }
            else if($property = "countOfRooms" && $value > 0 ){
                $this->countOfRooms = $value;
            }
        }
        //преобразовать в строку данные о квартире
        public function toStr(){
            $str = $this->numOfApartament . " квартира, владельцы: ";
            //добавить данные о всех владельцах квартиры
            for($owner = 0; $owner < $this->countOfOwners; $owner++){
                $str .=$this->arrayOfOwners[$owner] . "; ";
            }
            return $str;
        }
        //функция добавления владельца квартиры
        public function addOwner($owner){
            //функция array_search ищет в массиве элемент со значением owner, если такого нет, то добавляем в массив новое значение
            if(array_search($owner,$this->arrayOfOwners) == false)
                 $this->arrayOfOwners[] = $owner;
        }
        //функция удаления владельца квартиры
        public function removeOwner($owner){
            //функция array_search ищет в массиве владельцев ключ, которому соответствует элемент со значением owner 
            //если такое имя есть в массиве, то с помощью unset убираем из массива значение по найденному ключу
            if(($deleteKey = array_search($owner, $this->arrayOfOwners)) !== false)
            {
	                unset($this->arrayOfOwners[$deleteKey]);
            }
        }
        
    }