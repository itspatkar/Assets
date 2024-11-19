<html>
<body>

<?php

# Interface -
/* An interface is a completely "abstract class" that is used to group related methods with empty bodies.
Interface defines what the behavior an object will have,but it will not actually specify the behavior.
It is a contract, that will guarantee, that a certain class can do something.

// Interfaces vs. Abstract Classes
Interface are similar to abstract classes. The difference between interfaces and abstract classes are:
    - Interfaces cannot have properties, while abstract classes can
    - All interface methods must be public, while abstract class methods is public or protected
    - All methods in an interface are abstract, so they cannot be implemented in code and the abstract keyword is not necessary
    - Classes can implement an interface while inheriting from another class at the same time

Interfaces are declared with the interface keyword.
A class that implements an interface must implement all of the interface's methods.
*/

interface Car {
    public function model($m);
    public function engine($e);
    public function speed($s);
}

class BMW implements Car {
    public function model($m){
        echo "Car model is $m"; 
    }
    public function engine($e){
        echo "<br>Car engine is $e"; 
    }
    public function speed($s){
        echo "<br>Car speed is $s Kmph"; 
    }
}

$bmw = new BMW();
$bmw->model("BMW M22");
$bmw->engine("3000cc");
$bmw->speed("100");

?>

</body>
</html>
