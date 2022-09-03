<html>
<body>

<?php

/* Access Modifiers -
Properties and methods can have access modifiers which control where they can be accessed.
There are three access modifiers:
    - public : the property or method can be accessed from everywhere. This is default
    - protected : the property or method can be accessed within the class and by classes derived from that class
    - private : the property or method can ONLY be accessed within the class
*/


# Class & Objects -
class Fruit {
    /* In a class, variables are called properties and functions are called methods.
    The $this keyword refers to the current object, and is only available inside methods.
    */

    // Properties
    public $name;
    public $color;
    
    // Methods
    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }
    
    function set_color($color) {
        $this->color = $color;
    }
    function get_color() {
        return $this->color;
    }
}

// Creating objects -
$apple = new Fruit();

// Calling methods -
$apple->set_name('Apple');
$apple->set_color('Red');

echo "Name: " . $apple->get_name();
echo "<br>Color: " . $apple->get_color() . "<br>";


# The instanceof keyword -
/* check if an object belongs to a specific class. */
var_dump($apple instanceof Fruit);


# The final Keyword -
/* The final keyword can be used to prevent class inheritance or to prevent method overriding.

// Prevent class inheritance -
class Fruit {
    final public function intro() {
        // some code
    }
}
class Strawberry extends Fruit {
    // will result in error
    public function intro() {
        // some code
    }
}


// Prevent method overriding -
class Fruit {
    final public function intro() {
        // some code
    }
}
class Strawberry extends Fruit {
    // will result in error
    public function intro() {
        // some code
    }
}
*/


# Class Constants -
/* Constants cannot be changed once it is declared.
We can access a constant from outside the class by using the class name
followed by the scope resolution operator (::) followed by the constant name.

We can access a constant from inside the class by using the self keyword
followed by the scope resolution operator (::) followed by the constant name.
*/

class Example {
    const MESSAGE="<br>This is Constant!";
}
echo Example::MESSAGE;

class Example2 {
    const MESSAGE="<br>This is Constant!";

    public function msg() {
        echo self::MESSAGE;
    }
}
$example2 = new Example2();
$example2->msg();

?>

</body>
</html>
