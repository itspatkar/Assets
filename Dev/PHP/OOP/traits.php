<html>
<body>

<?php

# Traits -
/*
Traits are used to overcome the limitation of inheritance ie to able to implent only single inheritance.
Traits are used to declare methods that can be used in multiple classes.

Traits can have methods and abstract methods that can be used in multiple classes,
and the methods can have any access modifier (public, private, or protected).

Traits are declared with the trait keyword and To use a trait in a class, use the use keyword.

*/

trait Fruit {
    public function color($name){
        echo "Color is $name";
    }
}
class Apple {
    use Fruit;
}
$apple = new Apple();
$apple->color("Red");


# Using multiple traits -
trait Car {
    public function carModel($nameC){
        echo "<br>Car model is $nameC";
    }
}
trait Bike {
    public function bikeModel($nameB){
        echo "<br>Bike model is $nameB";
    }
}

class BMW {
    use Car;
}
$bmw = new BMW();
$bmw->carModel("BMW M23");

class Mahindra {
    use Car, Bike;
}
$mahindra = new Mahindra();
$mahindra->carModel("Mahindra Scorpio");
$mahindra->bikeModel("Mahindra Centuro");

?>

</body>
</html>
