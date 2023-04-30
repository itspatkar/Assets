<!DOCTYPE html>
<html>
<body>

<?php #declare(strict_types=1); // strict requirement


function basicIO(){
	echo "<h2><u>1. Input/Output</u></h2>";

	echo "My first PHP script!";
	echo "<h2>PHP is Fun!</h2>";
	echo("<h1>Hello World</h1>");

	print "Hello World!";
	print "<h2>PHP is Fun!</h2>";
	print("Hello World");

	$txt = "W3Schools.com";
	print "<br>I love $txt!";
	echo "<br>I love $txt";
	echo "<br>I love {$txt}";
}


function controlStructure(){
	echo "<h2><u>5. Else-If</u></h2>";

	$t = date("H");

	if ($t < "10"){
		echo "Have a good morning!";
	} elseif ($t < "20"){
		echo "Have a good day!";
	} else {
		echo "Have a good night!";
	}
}


function forEachLoop(){
	echo "<h2><u>2. Foreach loop</u></h2>";

	$colors = array("red", "green", "blue", "yellow");

	foreach ($colors as $value){
		echo "$value <br>";
	}
}


function Constants(){
	echo "<h2><u>3. Constants</u></h2>";

	# define(name, value, case-insensitive)

	define("GREETING", "Welcome to W3Schools.com!");
	echo GREETING;

	/*define("GREETING", "Welcome to W3Schools.com!", true);
	echo greeting; */ // Give error

	# constant arrays -
	define("cars", ["Alfa Romeo", "BMW", "Toyota"]);
	echo cars[0];
}


function phpArray(){
	echo "<h2><u>4.1 Single dimensional array</u></h2>";

	$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
	echo "Peter is " . $age['Peter'] . " years old.";

	foreach($age as $x => $x_value){
		echo "<br> Key=" . $x . ", Value=" . $x_value;
	}


	echo "<h2><u>4.2 Multi-dimensional array</u></h2>";

	$cars = array (
    	array("Volvo",22,18),
    	array("BMW",15,13),
    	array("Saab",5,2),
    	array("Land Rover",17,15)
    );

	for ($row = 0; $row < 4; $row++){
    	echo "<p><b>Row number $row</b></p>";
    	echo "<ul>";
    	for ($col = 0; $col < 3; $col++){
    		echo "<li>".$cars[$row][$col]."</li>";
    	}
    	echo "</ul>";
    }
}


# Functions -
function phpFunction(){
	# function with arguments -
	function funArg($name){
		echo "Hello $name <br>";
	}
	funArg("Mandar");
	funarg("Vinit");

	# Default Argument Value -
	function defaultArgument(int $age=18){
		echo "Your age is $age <br>";
	}
	defaultArgument(16);
	defaultArgument();

	# Returning values -
	function returnSum(int $x, int $y){
		$z = $x + $y;
		return $z;
	}
	echo "Sum is " . returnSum(2,3);

	# Return Type Declarations -
	function returnTypeAdd(float $a, float $b) : float {
		return $a + $b;
	}
	echo "<br>Sum is " . returnTypeAdd(1.2, 5.2);

	# Argument return type -
	function argReturnTypeAdd(float $a, float $b) : int {
		return (int)($a + $b);
	}
	echo "<br>Sum is " . argReturnTypeAdd(1.2, 5.2);

	# Passing Arguments by Reference -
	function addFive(&$value){
		echo "<br>";
		$value += 5;
	}
	$num = 2;
	addFive($num);
	echo $num;
}


# RegEx -
function funRegex(){
	# $exp = "/pattern/modifier";


	# preg_match() : Returns 1 if pattern was found in string and 0 if not
	$str = "Visit W3Schools";
	$pattern = "/w3schools/i";
	echo preg_match($pattern, $str); // Outputs 1

	# preg_match_all() : returns number of times pattern was found in string, which may also be 0
	$str = "The rain in SPAIN falls mainly on the plains.";
	$pattern = "/ain/i";
	echo preg_match_all($pattern, $str); // Outputs 4


	# preg_replace() : returns new string where matched patterns have been replaced with another string
	$str = "Visit Microsoft!";
	$pattern = "/microsoft/i";
	echo preg_replace($pattern, "W3Schools", $str); // Outputs "Visit W3Schools!"
}


# PHP Dates -
function phpDate(){
	echo "Today is " . date("Y/m/d") . "<br>";
	echo "Today is " . date("Y.m.d") . "<br>";
	echo "Today is " . date("l") . "<br>";;
	echo "This month is " . date("M") . " and year is " . date("Y") . "<br>";
	echo "The time is " . date("h:i:sa") . "<br>";
	echo "&copy; 2010-" . date("Y") . "<br>";

	date_default_timezone_set("America/New_York");
	echo "<br>Today is " . date("Y.m.d") . "<br>";
	echo "The time is " . date("h:i:sa") . "<br>";

	date_default_timezone_set("Asia/Kolkata");

	# Create a Date With mktime() -
	// Syntax: mktime(hour, minute, second, month, day, year)
	$d=mktime(11, 14, 54, 8, 12, 2014);
	echo "Created date is " . date("Y-m-d, h:i:sa", $d);

	# Create a Date From a String With strtotime() -
	// Syntax: strtotime(time, now)
	$d=strtotime("10:30pm April 15 2014");
	echo "<br>Created date is " . date("Y-m-d h:i:sa", $d);
	
	$d=strtotime("tomorrow");
	echo "<br>Tomorrow is " . date("Y-m-d h:i:sa", $d);
	
	$d=strtotime("next Saturday");
	echo "<br>Next saturday is " . date("Y-m-d h:i:sa", $d);
	
	$d=strtotime("+3 Months");
	echo "<br>Next 3 month is " . date("Y-m-d h:i:sa", $d) . "<br>";

	$startdate = strtotime("Saturday");
	$enddate = strtotime("+6 weeks", $startdate);
	echo "<br>";
	while ($startdate < $enddate){
		echo date("M d, Y", $startdate) . "<br>";
		$startdate = strtotime("+1 week", $startdate);
	}
}


# PHP include/require -
function phpInclude(){
	/* 'require' will produce a fatal error (E_COMPILE_ERROR) and stop the script.
	'include' will only produce a warning (E_WARNING) and the script will continue.

	When a file is included with the 'include' statement and PHP cannot find it, the script will continue to execute;
	If we do the same using the 'require' statement, the script execution dies after the require statement returned a fatal error.
	
	Use require when the file is required by the application.
	Use include when the file is not required and application should continue when file is not found.
	*/

	include 'includePHP.php';

	echo "Page name is " . $pageName;
	
}


# File Handling -
function fileHandling(){
	// readfile() function returns the content and number of bytes read on success.
	echo readfile("file.txt") . "<br><hr>";

	/* fopen() : open file for reading
	fread() : reads from an open file
	fclose() : close open file
	
	Mode	Description :
	r		Open file for read only. File pointer starts at beginning of file
	w 		Open file for write only. Erases contents of file or creates a new file if it doesn't exist. File pointer starts at beginning of file
	a 		Open file for write only. The existing data in file is preserved. File pointer starts at end of file. Creates a new file if file doesn't exist
	x 		Creates new file for write only. Returns FALSE and an error if file already exists
	r+ 		Open file for read/write. File pointer starts at the beginning of the file
	w+ 		Open file for read/write. Erases contents of file or creates a new file if it doesn't exist. File pointer starts at beginning of file
	a+ 		Open file for read/write. The existing data in file is preserved. File pointer starts at end of file. Creates a new file if file doesn't exist
	x+ 		Creates new file for read/write. Returns FALSE and error if file already exists
	*/

	$myfile = fopen("file.txt", "r") or die("Unable to open file!");
	echo fread($myfile,filesize("file.txt")) . "<br><hr>";
	fclose($myfile);

	# Read Single Line - fgets() : read single line from file
	$myfile = fopen("file.txt", "r") or die("Unable to open file!");
	echo fgets($myfile) . "<br><hr>";
	fclose($myfile);

	# Check End-Of-File - feof() : checks if the "end-of-file" (EOF) has been reached
	$myfile = fopen("file.txt", "r") or die("Unable to open file!");
	while(!feof($myfile)) {
		echo fgets($myfile) . "<br>";
	}
	fclose($myfile);

	# Create file with fopen() -
	$myfile = fopen("testfile.txt", "w");

	echo "<hr>";

	# Read Single Character - fgetc() : read a single character from a file
	// call to the fgetc() function, the file pointer moves to the next character.
	$myfile = fopen("file.txt", "r") or die("Unable to open file!");
	while(!feof($myfile)) {
		echo fgetc($myfile);
	}
	fclose($myfile);

	# Write to File - fwrite() : used to write to a file
	// when opened file for writing, all the existing data will be ERASED and we start with an empty file.
	$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
	$txt = "Hello Wolrd\n";
	fwrite($myfile, $txt);
	$txt = "I'm Learning PHP\n";
	fwrite($myfile, $txt);
	fclose($myfile);

}


# Cookies -
function phpCookie(){
	/* Syntax: setcookie(name, value, expire, path, domain, secure, httponly)

	Only the name parameter is required. All other parameters are optional.
	The setcookie() function must appear BEFORE the <html> tag.
	
	- Modify Cookie :
	To modify a cookie, just set (again) the cookie using the setcookie() function.

	- Delete Cookie :
	To delete a cookie, use the setcookie() function with an expiration date in the past.

	- Function isset() :
	Used to check whether cookie is set or not.
	*/
	
	// We might have to reload the page to see the value of the cookie.
	$cookie_name = "cookie1";
	$cookie_value = "Mandar";
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1day ie 30day 
	
	if(!isset($_COOKIE[$cookie_name])) {
		echo "Cookie named '" . $cookie_name . "' is not set!";
	} else {
		echo "Cookie '" . $cookie_name . "' is set!<br>";
		echo "Value is: " . $_COOKIE[$cookie_name];
	}

	# Check if Cookies are Enabled -
	setcookie("test_cookie", "test", time() + 3600, '/');
	if(count($_COOKIE) > 0) {
		echo "<br>Cookies are enabled.";
	} else {
		echo "<br>Cookies are disabled.";
	}
}


# Filters
function phpFilters(){
	/* PHP filters are used to validate and sanitize external input.
	The PHP filter extension has many of the functions needed for checking user input,
	and is designed to make data validation easier and quicker.
	
	Validating data = Determine if the data is in proper form.
	Sanitizing data = Remove any illegal character from the data.

	- Function filter_var() :
	filter_var() function filters a single variable with a specified filter. It takes two pieces of data:
    	1. The variable you want to check
    	2. The type of check to use
	*/

	# Sanatize String -
	$str = "<h1>Hello World!</h1>";
	$newstr = filter_var($str, FILTER_SANITIZE_STRING);
	echo $newstr;

	# Validate Integer -
	$int = 100;
	if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
		echo("<br>Integer is valid");
	} else {
		echo("<br>Integer is not valid");
	}

	# Validate IP Address -
	$ip = "127.0.0.1";
	if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
		echo("<br>$ip is a valid IP address");
	} else {
		echo("<br>$ip is not a valid IP address");
	}

	# Sanitize and Validate an Email Address -
	$email = "john.doe@example.com";
	// Remove all illegal characters from email
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	// Validate e-mail
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		echo("<br>$email is a valid email address");
	} else {
		echo("<br>$email is not a valid email address");
	}

	# Sanitize and Validate URL -
	$url = "https://www.w3schools.com";
	// Remove all illegal characters from a url
	$url = filter_var($url, FILTER_SANITIZE_URL);
	// Validate url
	if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
		echo("<br>$url is a valid URL");
	} else {
		echo("<br>$url is not a valid URL");
	}

	# Validate IPv6 Address -
	$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";
	if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
		echo("<br>$ip is a valid IPv6 address");
	} else {
		echo("<br>$ip is not a valid IPv6 address");
	}

	# Validate URL - Must Contain QueryString -
	$url = "https://www.w3schools.com";
	if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
		echo("$url is a valid URL with a query string");
	} else {
		echo("<br>$url is not a valid URL with a query string");
	}

	# Remove Characters With ASCII Value > 127 -
	$str = "<h1>Hello WorldÆØÅ!</h1>";
	$newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	echo "<br>" . $newstr;
}


# PHP Callback Functions -
function callBack(){
	/* A callback function or callback is a function which is passed as an argument into another function. */
	function my_callback($item) {
		return strlen($item);
	}
	
	$strings = ["apple", "orange", "banana", "coconut"];
	$lengths = array_map("my_callback", $strings);
	print_r($lengths);

	
	# Callback using Annonymous Function -
	$strings = ["apple", "orange", "banana", "coconut"];
	$lengths = array_map( function($item) { return strlen($item); } , $strings);
	print_r($lengths);


	# Callbacks in User Defined Functions -
	function exclaim($str) {
		return $str . "! ";
	}
	function ask($str) {
		return $str . "? ";
	}
	function printFormatted($str, $format) {
		// Calling the $format callback function
		echo $format($str);
	}
	
	// Pass "exclaim" and "ask" as callback functions to printFormatted()
	printFormatted("Hello world", "exclaim");
	printFormatted("Hello world", "ask");
}


# PHP JSON -
function phpJSON(){
	/* - Function json_encode() : used to encode a value to JSON format

	- Function json_decode() : used to decode a JSON object into a PHP object or an associative array
	json_decode() function returns an object by default.
	The json_decode() function has a second parameter, and when set to true, JSON objects are decoded into associative arrays.
	*/

	# Encode associative array into JSON object -
	$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
	echo json_encode($age);

	# Encode indexed array into JSON array -
	$cars = array("Volvo", "BMW", "Toyota");
	echo "<br>" . json_encode($cars);

	# Decodes JSON data into PHP object -
	$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
	echo "<br>";
	var_dump(json_decode($jsonobj));

	# Decodes JSON data into PHP associative array -
	$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
	echo "<br>";
	var_dump(json_decode($jsonobj, true));

	# Accessing decoded values from PHP object -
	$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
	$obj = json_decode($jsonobj);
	echo "<br>" . $obj->Peter;
	echo "<br>" . $obj->Ben;
	echo "<br>" . $obj->Joe;

	# Accessing decoded values from PHP associative array -
	$jsonobj = '{"Peter":50,"Ben":55,"Joe":60}';
	$arr = json_decode($jsonobj, true);
	echo "<br>" . $arr["Peter"];
	echo "<br>" . $arr["Ben"];
	echo "<br>" . $arr["Joe"];

	# Looping through the values of PHP object -
	$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
	$obj = json_decode($jsonobj);
	foreach($obj as $key => $value) {
		echo "<br>" . $key . " => " . $value;
	}

	# Looping through the values of PHP associative array -
	$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
	$arr = json_decode($jsonobj, true);
	foreach($arr as $key => $value) {
		echo "<br>" . $key . " => " . $value;
	}
}


# PHP Exceptions -
function phpExceptions(){
	/* An exception is an object that describes an error or unexpected behaviour of a PHP script.
	*/

	# Throwing exception without catching -
	function divide($dividend, $divisor) {
		if($divisor == 0) {
			throw new Exception("Division by zero");
		}
		return $dividend / $divisor;
	}
	echo divide(5, 2);

	# try...catch Statement -
	function divideCatch($dividend, $divisor) {
		if($divisor == 0) {
			throw new Exception("Division by zero");
		}
		return $dividend / $divisor;
	}
	try {
		echo "<br>" . divideCatch(5, 0);
	} catch(Exception $e) {
		echo "<br>Unable to divide.";
	}

	# try...catch...finally Statement -
	/* Code in the finally block will always run regardless of whether an exception was caught.
	If finally is present, the catch block is optional. */
	function divideCatchFinally($dividend, $divisor) {
		if($divisor == 0) {
			throw new Exception("Division by zero");
		}
		return $dividend / $divisor;
	}
	try {
		echo "<br>" . divideCatchFinally(5, 0);
	} catch(Exception $e) {
		echo "<br>Unable to divide.";
	} finally {
		echo "<br>Process complete.";
	}

	# Output string even if exception was not caught -
	function divideFinally($dividend, $divisor) {
		if($divisor == 0) {
			throw new Exception("Division by zero");
		}
		return $dividend / $divisor;
	}
	try {
		echo "<br>" . divideFinally(5, 0);
	} finally {
		echo "<br>Process complete.";
	}

	# Exception Object -
	/* The Exception Object contains information about the error or unexpected behaviour that the function encountered.
	- Syntax: new Exception(message, code, previous)

	Parameter Values :
	- message : string describing why the exception was thrown (Optional)
	- code : integer that can be used used to easily distinguish this exception from others of the same type (Optional)
	- previous : If this exception was thrown in catch block of another exception,
				 it is recommended to pass that exception into this parameter (Optional)
	
	Methods :
	- getMessage() : Returns string describing why the exception was thrown
	- getPrevious() : If this exception was triggered by another one, this method returns the previous exception.
					  If not, then it returns null
	- getCode() : Returns the exception code
	- getFile() : Returns the full path of the file in which the exception was thrown
	- getLine() : Returns the line number of the line of code which threw the exception
	*/
	function divideExceOb($dividend, $divisor) {
		if($divisor == 0) {
			throw new Exception("Division by zero", 1);
		}
		return $dividend / $divisor;
	}
	try {
		echo divideExceOb(5, 0);
	} catch(Exception $ex) {
		$code = $ex->getCode();
		$message = $ex->getMessage();
		$file = $ex->getFile();
		$line = $ex->getLine();
		echo "<br>Exception thrown in $file on line $line: [Code $code] $message";
	}
}



# Function execution -
//basicIO();
//controlStructure();
//forEachLoop();
//Constants();
//phpArray();
//phpFunction();
//funRegex();
//phpDate();
//phpInclude();
//fileHandling();
//phpCookie();
//phpFilters();
//callBack();
//phpJSON();
//phpExceptions();


?>

</body>
</html>
