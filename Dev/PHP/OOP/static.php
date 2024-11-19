<html>
<body>

<?php

# Static Keyword -
/* The static keyword belongs to the class than an instance of the class.
An ordinary variable is limited to the scope in which it is defined, while the scope of the static variable is throughout the program.
Static property/methods can be called directly - without creating an instance of the class first.
Static property/methods are declared with the static keyword.
*/


# Static Methods & Properties -

class Demo {
    # Static Property -
    public static $msg="This is static property.";
    # Static Methods -
    public static function demoF(){
        echo "This is static method.";
    }
}
Demo::demoF();
echo "<br>" . Demo::$msg;


// Example 2 -
class Demo2 {
    public static $demoProp="This is static property 2.";
    public static function demoF(){
        echo "<br>This is static method 2.";
    }
    public function __construct(){
        self::demoF();
        echo "<br>" . self::$demoProp;
    }
}
new Demo2();


// Example 3 -
class A {
    public static function methodA(){
        echo "<br>This is method A.";
    }
}
class B {
    public function methodB(){
        A::methodA();
    }
}
$obB = new B();
$obB->methodB();


// Example 4 -
/* To call a static method from a child class, use the parent keyword inside the child class.
Here, the static method can be public or protected. */
class Domain {
    public static $website="W3Schools.com";
    protected static function getWebsiteName(){
        return self::$website;
    }
}
class DomainW3 extends Domain {
    public $websiteName;
    public function __construct(){
        $this->websiteName = parent::getWebsiteName();
    }
}
$domainW3 = new DomainW3;
echo "<br>" . $domainW3 -> websiteName;

?>

</body>
</html>
