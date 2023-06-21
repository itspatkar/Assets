# Input & Output:
def io():
    """ Syntax of print:
    print(object=, separator=, end=, file=, flush=)
    - object: value to be printed.
    - sep: allows us to separate multiple objects inside print(). (optional)
    - end: allows us to add specific values like new line "\n" or tab "\t". (optional)
    - file: where the values are printed. It's default value is sys.stdout i.e. screen. (optional)
    - flush: boolean specifying if the output is flushed or buffered. Default is False. (optional)
    """
    # print statement/function:
    print("Hello World")
    print("Hello", "World", end='')
    print("Hello","World",sep=',')

    # Formatting Output:
    """ > Formatting output using str.format():
    {} is placeholder
    """
    print("I am {} and my age is {}".format("Vinit",18))

    # f-string:
    name = "Vinit"
    country = "Bharat"
    print(f"I am {name} from {country}")

    # Python is dynamically typed language, we don't need to explicitly mention data type associated:
    greet = "Hello World"
    print(greet)

    x = input() # Returns input as string
    print(x)
    x = input("Enter Number:")
    print("You entered",x)


# Comments:
def comments():
    # This is Single-Line Comment
    print("Comments")
    """
    This is Multi-Line Comment with Docstrings
    """


# Namespaces:
## Global Variable:
glob_name = "Vinit"
def namespaces():
    """ > Namespace:
    Namespace is mapping of names to objects, or simply it is a collection of names.
    """
    loc_name = "Vinita"
    print(glob_name)
    print(loc_name)

    # Global keyword - allows us to create or modify the variable outside of the global scope :
    #global glob_name = "Vinita"


# Operators:
def operators():
    """
    > Operators
    - Arithmetic: +, -, *, /, %, // (truncated div- remove decimal), ** (power)
    - Comparison: ==, !=, <, <=, >, >=
    - Logical: and , or , not
    - Bitwise: &, |, ~, ^, <<, >>
    - Membership: in , not in
    - Identity: is , is not

    NOTE: Python doesn't support increment and decrement operators.
    """
    print(1 == 1 and 1 != 2)
    print("W" in "Hello World")


# Casting:
def casting():
    print(int(12.5))
    print(float(12))
    print(str(123))
    print(complex(2))
    print(list([1,2,3,4,5])) # Returns list
    print(tuple([1,2,3,4,5])) # Returns tuple
    #print(dict()) # Returns dictionary
    # NOTE: Always convert input to int/float to avoid errors


# Conditionals:
def conditionals():
    x,y,z = 5,5,10
    # If :
    if x==y:
        print("Equal")

    # If-Else :
    if x==y:
        print("Equal")
    else:
        print("Not Equal")

    # Elif :
    if x==z:
        print("Equal")
    elif y==z:
        print("Equal")
    else:
        print("Not Equal")


# Loops/Iterations:
def loops():
    i = 5
    # While Loop:
    while i>0:
        print(i)
        i=i-1

    # While loop with Else:
    i=2
    while i>0:
        print(i)
        i-=1
    else:
        print("Terminating loop...!")

    # For Loop:
    fruits = ["Mango", "Apple", "Orange", "Melon"]
    for i in fruits:
        print(i)


# Passing statement:
def passing():
    """ > pass :
    The pass statement is a null statement which can be used as a placeholder for future code.
    """
    if 2 > 1:
        pass
    print("Passed")
