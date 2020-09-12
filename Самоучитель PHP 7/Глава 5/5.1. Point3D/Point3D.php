
<?php
    //Класс точки в трехмерном пронстранстве
    class Point3D{
        //координаты точки x,y,z
        public $x;
        public $y;
        public $z;
        //Конструктор класса, принимающий координаты x,y,z 
        public function __construct($x,$y,$z){
            $this->x = $x;
            $this->y = $y;
            $this->z = $z;
        }
    }