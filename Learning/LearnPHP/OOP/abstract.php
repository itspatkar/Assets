<html>
<body>

<?php

# Abstract Class & Methods -
/* An abstract class is a class that contains at least one abstract method.
An abstract method is a method that is declared, but not implemented in the code ie in parent class.
An abstract class or method is defined with the abstract keyword.

when a child class is inherited from an abstract class, we have the following rules:
    - The child class method must be defined with the same name and it redeclares the parent abstract method
    - The child class method must be defined with the same or a less restricted access modifier
    - The number of required arguments must be the same. However, the child class may have optional arguments in addition

*/

abstract class Car {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }
    
    abstract public function intro() : string;
    abstract protected function model($name);
    abstract protected function price($cost);
}

class Mahindra extends Car {
    // With return type -
    public function intro() : string {
        return "This is my {$this->name}!";
    }
    public function model($year){
        return $year . " Model";
    }
    // With optional positional arguments -
    public function price($cost, $service_charge = "5000", $insurance = "3000") {
        return $cost+$service_charge+$insurance;
    }
}

$scorpio = new Mahindra("Mahindra Scorpio");
echo $scorpio->intro();
echo "<br>" . $scorpio->model("2021");
echo "<br>Price of car is Rs " . $scorpio->price(100000);

?>

</body>
</html>
