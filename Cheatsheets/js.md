# JavaScript -

## Table Of Content :
* [JS Output](#js-output)
* [JS HTML DOM](#js-html-dom)
* [Browser Object Model](#browser-object-model)
* [Time Methods](#time-methods)
* [Cookies](#cookies)
* [Data Types](#data-types)
* [Comments](#comments)
* [Variable](#variable)
* [Operators and Methods](#operators-and-methods)
* [Comparison](#comparison)
* [String](#string)
* [Numbers](#numbers)
* [Arrays](#arrays)
* [Date Objects](#date-objects)
* [Math Object](#math-object)
* [Loops](#loops)
* [Type Conversion](#type-conversion)
* [RegEx](#regex)
* [Form Validation](#form-validation)
* [Error Handling](#error-handling)
* [Arrow Function](#arrow-function)
* [Objects](#objects)
* [Class](#class)
* [Getter-Setter](#getter-setter)
* [Prototype](#prototype)
* [Anonymous Functions](#anonymous-functions)
* [Function Constructor](#function-constructor)
* [Self-Invoking Functions](#self-invoking-functions)
* [arguments Object](#arguments-object)
* [Closures](#closures)

<br>


## JS Output
- `element.innerHTML`
- `document.write("message")`
- `window.alert("message")`
- `console.log("message")`


## JS HTML DOM
*elements return as array*

### Finding Elements (method) :
- `document.getElementById("id")`
- `document.getElementsByTagName("class")`
- `document.getElementsByClassName("tag")`
- `document.querySelectorAll("class/id/tag")`  (by CSS selector)

### Changing HTML Elements (property) :
- `element.innerHTML =  "new html content"`
- `element.attribute = "new value"`
- `element.style.property = "new style"`  (CSS Style)
- `element.setAttribute(attribute, value)`  (Method)

**Ex-**
1. `document.getElementById("name").innerHTML = Date();`
2. `document.getElementById("theme-descript").style.backgroundColor="#ffc294";`
3.
```
var x = document.getElementById("main");
var y = x.getElementsByTagName("p");
document.getElementById("demo").innerHTML = y[0].innerHTML;
```
4.
```
var x = document.querySelectorAll("p.intro");
x.value = x.value.toUpperCase();
```
5. `var x = document.forms["frm1"];`
6.
```
<img id="myImage" src="smiley.gif">
document.getElementById("myImage").src = "landscape.jpg";
```

### Adding/Removing HTML Element :
- `element.createElement("class/id/tag/element")`
- `element.remove("class/id/tag/element")`
- `element.appendChild("child-node")`
- `element.replaceChild(old-class/id/tag/element, new-class/id/tag/element)`
- `para-element.removeChild("child-node")`
- `document.write("message")`

### Returns HTML Elements/Objects :
- `document.anchors`
- `document.applets`
- `document.baseURI`
- `document.body`
- `document.cookie`
- `document.doctype`
- `document.documentElement`
- `document.documentMode`
- `document.documentURI`
- `document.domain`
- `document.domConfig`
- `document.embeds`
- `document.forms`
- `document.head`
- `document.images`
- `document.implementation`
- `document.inputEncoding`
- `document.lastModified`
- `document.links`
- `document.readyState`
- `document.referrer`
- `document.scripts`
- `document.strictErrorChecking`
- `document.title`
- `document.URL`

### Event Listener :
- `element.addEventListener(event, function)`
- `element.removeEventListener(event, function)`
- `document.getElementById("id").onclick = function(){code}`

Eg:
```
element.addEventListener("click", myFunction);
window.addEventListener("load", hello);
```

### JS Node :
- `nodeValue` - gives value of property
- `nodeName` - gives name of property

<br>

- `parentNode`
- `childNodes[nodenumber]`
- `element.firstChild`
- `element.lastChild.nodeValue`
- `nextSibling`
- `previousSibling`
- `document.body` - body of document
- `document.documentElement` - full document
- `remove()`
- `removeChild()`
- `replaceChild()`

Eg:
1.
```
document.getElementById("id02").innerHTML = document.getElementById("id01").firstChild.nodeValue;
document.getElementById("id02").innerHTML = document.getElementById("id01").childNodes[0].nodeValue;
```
2.
```
var elmnt = document.getElementById("p1");
elmnt.remove();
```
3.
```
var parent = document.getElementById("div1");
var child = document.getElementById("p1");
parent.removeChild(child);
```


## Browser Object Model
### Window Methods & Properties :
- `window.innerHeight`
- `window.innerWidth`
- `window.open()` - Ex: window.open("link")
- `window.close()`
- `window.moveTo()`
- `window.resizeTo()`
- `window.print();`
- `screen.width`
- `screen.height`
- `screen.availWidth` (without taskbar)
- `screen.availHeight` (without taskbar)
- `screen.colorDepth`
- `screen.pixelDepth`
- `window.location` (page url)
- `window.location.href`
- `window.location.hostname`
- `window.location.pathname`
- `window.location.protocol`
- `window.location.assign()`
- `window.history`
- `history.back()`
- `history.forward()`
- `window.navigator`
- `navigator.appName`
- `navigator.appCodeName`
- `navigator.platform`
- `navigator.language`
- `navigator.userAgent`
- `navigator.cookieEnabled` (trur/false)
- `navigator.onLine` (returns true if browser online)
- `navigator.javaEnabled()` (true/false)

### Pop-Up :
- `window.alert("sometext")`
- `window.confirm("sometext")`
- `window.prompt("sometext")`  (js input)
- `window.prompt("sometext","defaultText")` (js input)


## Time Methods
```
var = setTimeout(function, milliseconds)
clearTimeout(var)
var = setInterval(function, milliseconds)
clearInterval(var)
```


## Cookies
```
document.cookie = "username=tg";
document.cookie = "username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC";
document.cookie = "username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
var x = document.cookie; // return all cookies in one string : cookie1=value;
```


## Data Types
- Datatypes: String, Number, Boolean, Object, Function
- Objects: Object, Date, Array, String, Number, Boolean
- Not Value: Null, Undefined
- NaN : not-a-number (number), Infinity (number)


## Comments
- Single line : `\\ this is single line comment`
- Multi-line : `/* this is multi-line comment */`


## Variable
*Without declaration - global*

### Keywords :
- `var` - within block where declared
- `let` - temporary or within block access
- `const` - constants variable


## Operators and Methods

### Arithmetic :
| Operators | Definition |
| --- | --- |
| `+` | addition or string concat |
| `-` | substraction |
| `*` | multiplication |
| `/` | division |
| `**` | exponentiation |
| `%` | modulus |
| `++` | increment |
| `--` | decrement |

*JS supports short-hand assignment operators.*

### Comparison :
| Operators | Definition |
| --- | --- |
| `==` | equal to |
| `===` | equal value and equal type |
| `!=` | not equal |
| `!==` | not equal value or not equal type |
| `>` | greater than |
| `<` | less than |
| `>=` | greater than or equal to |
| `<=` | less than or equal to |
| `?:` | ternary operator |

### Logical :
| Operators | Definition |
| --- | --- |
| `&&` | logical and |
| `\|\|` | logical or |
| `!` | logical not |

### Type :
| Operators | Definition |
| --- | --- |
| `typeof` | returns type of variable |
| `instanceof` |  Returns true if object is instance of object type |

### Other Operators and Methods :
| Operators | Definition |
| --- | --- |
| `delete` | delete object/property (object.property)
| `in` | returns true if instance/value exists in object/collection else false ("PI" in Math is true) |
| `Boolean(expression)` | return boolean value of expression (true/false) |
| `isNumber(exp)` | return true if exp is number else false |
| `isNaN(exp)` | return true if exp is not number else false |
| `isArray(exp)` | return true if exp is array else false |


## Conditionals :
1. if
```
if (condition){
	// code
}
```

2. if-else
```
if (condition){
	// code
} else {
	// code
}
```

3. else-if
```
if (condition){
	// code
} else if (condition){
	// code
} else {
	// code
}
```

4. switch statement
```
switch(expression) {
	case x:
		// code
		break;
	case y:
		// code
		break;
	default:
		// code
} 
```
*Switch cases use strict comparison (===), values must be of same type to match.*


## Loops
1. for loop :
*loops through block of code number of times.*
```
for(init;cond;inc/dec){
	// code
}
```

2. for/in :
*Loop through properties of object.
must use person[x] in the loop (person.x will not work because x is variable).*
```
for (x in object) {
    text += person[x];
}
```

3. for/of :
*Loops through the values of an iterable object
Iterable can be string, array, maps.*
```
for (x of var_iterable) {
    document.write(x + "<br >");
}
```


## String
*String is immutable in js.*

- `str.length` : return string length
- `str.search("text")` : if found return index of first occurance else -1 (can use with regex)
- `str.indexOf("text")` : if found return index of first occurance else -1
- `strlastIndexOf("text")` : if found return last index of first occurance else -1
- `str.slice(start, end)` : return new string from index start to end (-ve index count from last)
- `str.substring(start, end)` : same as slice except it not accept -ve index
- `str.substr(start, length)` : return new string from index start upto length (if omit length - return rest of string)
- `str.replace(find,with)` : replace "find" with "with" in string (it is case sensitive)
- `str.toUpperCase()` : convert string to uppercase
- `str.toLowerCase()` : comvert string to lowercase
- `str.concat("text1",text2)` : concat text1 with text2 (same as + operator)
- `str.trim()` : removes whitespaces from both sides of string
- `str.charAt(index)` : return char at specified index
- `str.charCodeAt(index)` : return char unicode at specified index

#### Property Access :
- `str[index]` : return char at specified index (read-only)

**Note :**
All string methods return new string, They don't modify original string.
Formally said: Strings are immutable, Strings cannot be changed and only replaced. 


## Numbers
- `no.toString()` : convert no to string
- `no.toFixed(digit)` : return number written with specified number of decimals
- `no.toPrecision(digit)` :  returns string with number written with specified length
- `noOb.valueOf()` : convert from no object to primitive no
- `Number(arg)` : returns number converted from its arg
- `parseInt(arg)` : parses its arg and returns float
- `parseFloat(arg)` : parses its arg and returns integer

*If number cannot be converted, NaN (Not a Number) is returned.*


## Arrays

### Creating Array :
- `array = [ "A", "B", "C"], [1,2,3]` (recommended)
- `var cars = new Array("Mahindra", "Tata", "BMW")`  (create array as object - not recommended)

<br>

### Array Methods :
- `arr.length` : return array length
- `arr[index]` : access array element at specified index
- `Array.isArray(arr)` : checks whether object is array
- `arr.toString()` : convert and return elements as string seperated by comma
- `arr.join("*")` : convert and return elements as string seperated by *
- `arr.pop()` : remove and return last element of array
- `arr.push(element)` : add new element at end of array and return length
- `arr.shift()` : remove and return first element by shift all to lower index by one
- `arr.unshift(element)` : add new element to beggining of array and return new length
- `arr.splice(index,how,elements)` : add/remove element list at end (how-no of elements to remove,elements-element to be added)
- `arr.concat(array2,array3)` : join two or more array and return
- `arr.slice(start, end)` : slice and return array from index start to end
- `arr.sort()` : sort array in ascending alphabetical order
- `arr.reverse()` : reverse order of elements in array
- `delete arr[index]` : deletes array element at index


## Date Objects
Creating date object :
`var d = new Date()`

### Convert to string methods :
- `d.toUTCString()` : converts Date object to string, according to universal time
- `d.toDateString()` : converts date portion of Date object into readable string

### Get Date Methods :
*Get methods used for getting information from date object.*
- `d.getFullYear()`
- `d.getMonth()`
- `d.getDate()`
- `d.getHours()`
- `d.getMinutes()`
- `d.getSeconds()`
- `d.getMilliseconds()`
- `d.getTime()`
- `d.getDay()`
- `d.Date.now()`

### UTC d.getUTCMethod() :
*Set date methods let you set date values for date object.*
- `d.setDate()`
- `d.setFullYear()`
- `d.setMilliseconds()`
- `d.setHours()`
- `d.setMinutes()`
- `d.setMonth()`
- `d.setSeconds()`
- `d.setTime()`


## Math Object
*Can be use without Math object.*
- `Math.sqrt(x)` :  returns square root of x
- `Math.pow(x,y)` :  returns value of x to power of y
- `Math.abs(x)` : returns absolute (positive) value of x
- `Math.round(x)` : returns value of x rounded to its nearest integer
- `Math.ceil(x)` : returns value of x rounded up to its nearest integer
- `Math.floor(x)` : returns value of x rounded down to its nearest integer
- `Math.sin(x)` : returns sine (value between -1 and 1) of angle x
- `Math.cos(x)` :  returns cosine (value between -1 and 1) of angle x (given in radians)
- `Math.random(x)` : returns random number between 0 (inclusive), and 1 (exclusive)
- `Math.min(x1,x2,...)` : return lowest value from list of args
- `Math.max(x1,x2,...)` : return highest value from list of args
- `Math.floor(Math.random(x)*n)` : return random int betn 0 to (n-1)
- `Math.floor(Math.random(x) * (max - min + 1) ) + min;` : return random int betn min and max


## Type Conversion
- `String(Date()|true|false|val)` : returns string
- `Number()` : returns no from string and NaN if invalid


## RegEx
- `search()` : searches for match - returns matched position
- `replace()` : searches for match - return new replace matched
- `x=string.search(pattern/modifier)` //search("w3school"), search(/w3school/i)
- `x=string.replace(pattern/modifier)` //replace(/miscrosoft/i,"w3school")
- `x=/e/.test("The Cool Boy")` //true if pattern exist
- `ob=/e/.exec("The Cool Boy")` //returns object of matched
- `ob[0], ob.index, ob.input`

### Modifier :
- `i` - case insensitive
- `g` - global search
- `m` - multiple search

Eg:
```
var str = "\nIs th\nis it?";
var patt1 = /^is/m;
var result = str.match(patt1);
```

### RegEx Pattern :
*To be searched/replaced.*
- `[abc]` Find any character between the brackets
- `[^abc]` Find any character NOT between the brackets
- `[0-9]` Find any character between the brackets (any digit)
- `[^0-9]` Find any character NOT between the brackets (any non-digit)
- `(x|y)` Find any of the alternatives specified

Eg:
```
var str = "Is this all there is?";
var patt1 = /[h]/g;
var result = str.match(patt1); //h,h
```

### Metacharacters :
- `.` - Find a single character, except newline or line terminator
- `\w` - Find a word character
- `\W` - Find a non-word character
- `\d` - Find a digit
- `\D` - Find a non-digit character
- `\s` - Find a whitespace character
- `\S` - Find a non-whitespace character
- `\b` - Find a match at the beginning/end of a word, beginning like this: \bHI, end like this: HI\b
- `\B` - Find a match, but not at the beginning/end of a word
- `\0` - Find a NULL character
- `\n` - Find a new line character
- `\f` - Find a form feed character
- `\r` - Find a carriage return character
- `\t` - Find a tab character
- `\v` - Find a vertical tab character
- `\xxx` - Find the character specified by an octal number xxx
- `\xdd` - Find the character specified by a hexadecimal number dd
- `\udddd` - Find the Unicode character specified by a hexadecimal number dddd

Eg:
```
var str = "Give 100%!"; 
var patt1 = /\w/g;
var result = str.match(patt1);
```

### Quantifier :
- `n+` - Matches any string that contains at least one n
- `n*` - Matches any string that contains zero or more occurrences of n
- `n?` - Matches any string that contains zero or one occurrences of n
- `n{X}` - Matches any string that contains a sequence of X n's
- `n{X,Y}` - Matches any string that contains a sequence of X to Y n's
- `n{X,}` - Matches any string that contains a sequence of at least X n's
- `n$` - Matches any string with n at the end of it
- `^n` - Matches any string with n at the beginning of it
- `?=n` - Matches any string that is followed by a specific string n
- `?!n` - Matches any string that is not followed by a specific string n

Eg:
```
var str = "100, 1000 or 10000?";
var patt1 = /\d{4}/g;
var result = str.match(patt1);
```


## Form Validation
Method `checkValidity()` :

### Validation DOM Properties :
- `validity` - contains boolean properties related to validity of input element
- `validationMessage` - contains message browser will display when validity is false
- `willValidate` - indicates if input element will be validated

Ex:
*If input field contains invalid data, display message (checkValidity() method)*
```
<input id="id1" type="number" min="100" max="300" required>
<button onclick="myFunction()">OK</button>

<p id="demo"></p>

<script>
function myFunction() {
    var inpObj = document.getElementById("id1");
    if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
    }
}
</script>
```

### Validity Properties :
- `customError` - set to true, if custom validity message is set
- `patternMismatch` - set to true, if element's value does not match its pattern attribute
- `rangeOverflow` - set to true, if element's value is greater than its max attribute
- `rangeUnderflow` - set to true, if element's value is less than its min attribute
- `stepMismatch` - set to true, if element's value is invalid per its step attribute
- `tooLong` - set to true, if element's value exceeds its maxLength attribute
- `typeMismatch` - set to true, if element's value is invalid per its type attribute
- `valueMissing` - set to true, if element (with required attribute) has no value
- `valid` - set to true, if element's value is valid

Ex:
*If number in input field >100 (input's max attribute), display a message (rangeOverflow property)*
```
<input id="id1" type="number" max="100">
<button onclick="myFunction()">OK</button>

<p id="demo"></p>

<script>
function myFunction() {
    var txt = "";
    if (document.getElementById("id1").validity.rangeOverflow) {
        txt = "Value too large";
    }
    document.getElementById("demo").innerHTML = txt;
}
</script> 
```


## Error Handling
```
try {
    error-code;
} catch(error-ob){
    display = error.message;
}
throw var //throws custom error
finally {
    some-code;
}
```
*(js'll create 2 ob with property name and message)*

### Error Object Properties :
- `name` - sets or returns error name
- `message` - sets or returns error message (string)

Ex:
*This example examines input. If value is wrong, exception (err) is thrown.
The exception (err) is caught by catch statement and custom error message is displayed.*
```
<p>Please input a number between 5 and 10:</p>

<input id="demo" type="text">
<button type="button" onclick="myFunction()">Test Input</button>
<p id="p01"></p>

<script>
function myFunction() {
    var message, x;
    message = document.getElementById("p01");
    message.innerHTML = "";
    x = document.getElementById("demo").value;
    try {
        if(x == "") throw "empty";
        if(isNaN(x)) throw "not a number";
        x = Number(x);
        if(x < 5) throw "too low";
        if(x > 10) throw "too high";
    } catch(err) {
        message.innerHTML = "Input is " + err;
    }
}
</script>
```


## Arrow Function
- `x = function(){ return "text"; }`
- `x = () => { return "text"; }`
- `x = () => "text";` //function?=returns only one statement
- `x = (param) => "text"+param;` //function?=param
- `x = param => "text"+param;` //function?=only one param


## Objects
```
var person = {
    firstName: "John",
    id : 5566,
    fullName : function() {
        return this.firstName + " " + this.lastName;
    }
};
```

### Adding Function & Property to existing object :
```
ob.p_name = "value";
ob.f_name = function(){
    return this.firstname+" "+this.lastname;
};
```

### Object Constructor Function :
```
function PersonObject(first,last, age){
    this.firstname=first;
    this.lastname=last;
    this.age=age;
    this.nationality="Indian";
}
var user = new PersionObject("John","Dev",17);
elementValue=user.age;
```
*New Property & Functions can't be added in existing objects.*

### Calls method of another object
call() : method takes arguments separately
apply() : method takes arguments as an array


## Class
*Should use In strict mode.*

```
class class-n {
constructor(param){
    this.val-n = param; }
method-n(x){
    return "text"+this.val+x; }
static method-n(){
    return "static"; }
}
// Calling Methods -
ob-n = class-n("param");
ob-n.method-n("cool");
ob-n.val-n;
// Calling Static Method -
class-n.method-n;
```

### Inheritance :
```
class Car {
    constructor(brand) {
        this.carname = brand;
    }
    present() {
        return 'I have a ' + this.carname;
    }
}
class Model extends Car {
    constructor(brand, mod) {
        super(brand); //refers patent class
        this.model = mod;
    }
    show() {
        return this.present() + ', it is a ' + this.model;
    }
}
mycar = new Model("Ford", "Mustang");
document.getElementById("demo").innerHTML = mycar.show();
```

## Getter-Setter
```
class Car {
    constructor(brand) {
        this._carname = brand;
    }
    get carname() {
        return this._carname;
    }
    set carname(x) {
        this._carname = x;
    }
}
mycar = new Car("Ford");
mycar.carname = "Volvo";
document.getElementById("demo").innerHTML = mycar.carname;
```

### Getter and Setter :
```
//Getter -
var person = {
    language : "english",
    get lang() {
        return this.language;
    }
};
document.getElementById("demo").innerHTML = person.lang;
//Setter -
var person = {
    language : "",
    set lang(lang) {
        this.language = lang;
    }
};
person.lang = "en";
document.getElementById("demo").innerHTML = person.language;
```


## Prototype
```
ob.prototype.prop_name = "value";
ob.prototype.fun_name = function(){
    return this.firstName + " " + this.lastName;
}
```


## Anonymous Functions
*Function without name.*
```
var x = function (a, b) {return a * b};
var z = x(4, 3);
```


## Function Constructor
```
var myFunction = new Function("a", "b", "return a * b");
var x = myFunction(4, 3);
```
Can be -
```
var myFunction = function (a, b) {return a * b};
var x = myFunction(4, 3);
```


## Self-Invoking Functions
*Functions that calls itself.*
```
(function () {
  var x = "Hello!!";  // I will invoke myself
})();
```


## arguments Object
*Store arg passed at invocation as array.*
- arguments[i] : return argument at i
- arguments.length : return total arguments passed
