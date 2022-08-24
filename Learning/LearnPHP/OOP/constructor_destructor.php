<html>
<body>

<?php

# Constructor & Destructor -
class Car {
    public $name;
    public $color;

     # The __construct Function -
    /*A constructor allows you to initialize an object's properties upon creation of the object.
    Notice that the construct function starts with two underscores (__)
    */
    function __construct($name, $color) {
        echo "Calling constructor!";
        $this->name = $name;
        $this->color = $color;
    }

    # The __destruct() Function -
    /* A destructor is called when the object is destructed or the script is stopped or exited.
    Notice that the destruct function starts with two underscores (__)
    */
    function __destruct(){
        echo "<br>Calling destructor!";
    }

    function get_name() {
        return $this->name;
    }
    function get_color() {
        return $this->color;
    }
}

$car = new Car("Mahindra","Blue");
echo "<br>" . $car->get_name();
echo "<br>" . $car->get_color();

?>

</body>
</html>
