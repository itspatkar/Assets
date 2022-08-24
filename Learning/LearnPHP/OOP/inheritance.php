<html>
<body>

<?php

# Inheritance -
/* The child class will inherit all the public and protected properties and methods from the parent class.
In addition, it can have its own properties and methods.
PHP only supports single inheritance: a child class can inherit only from one single parent.

An inherited class is defined by using the extends keyword.
*/

class Food {
    public $name;
    public $cost;

    public function __construct($name, $cost){
        $this->name = $name;
        $this->cost = $cost;
    }

    public function order(){
        echo "You ordered $this->name of Rs. $this->cost";
    }
}
// Frankie is inherited from Food
class FastFood extends Food {
    public function info(){
        echo "<br>This is frankie.";
    }
}
$frankie = new FastFood("Frankie",120);
$frankie->order();
$frankie->info();


# Inheritance and the Protected Access Modifier -
/* protected properties or methods can be accessed within the class and by classes derived from that class. */
class Android {
        public $version;
        public $version_name;

        public function __construct($version_name, $version){
            $this->version_name = $version_name;
            $this->version = $version;
        }

        protected function info(){
            echo "<br>Android version is {$this->version_name} ({$this->version})";
        }

        public function info_OR(){
            echo "<br>Android version is {$this->version_name} ({$this->version})";
        }
}
class AOSiP extends Android {
    public function about(){
        echo "<br>This is AOSP based rom";

        // Call protected method from within derived class -
        $this->info();
    }
}
$build = new AOSiP("Pie",9);
$build->about();


# Overriding Inherited Methods -
class LineageOS extends Android {
    public $sec_pat;

    public function __construct($version_name, $version, $sec_pat){
        $this->version_name = $version_name;
        $this->version = $version;
        $this->sec_pat = $sec_pat;
    }

    public function info_OR(){
        echo "<br>Android version is {$this->version_name} ({$this->version}) with security patch {$this->sec_pat}.";
    }
}
$build2 = new LineageOS("Oreo",8,"Dec 5, 2021");
$build2->info_OR();

?>

</body>
</html>
