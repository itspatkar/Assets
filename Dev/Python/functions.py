"""
> Syntax:
def function_name():
    # Statements

# Function calling:
function_name()
"""

# Function definition:
def greet():
    print("Hello World")

# Function with Arguments:
def wish(name):
    print("Hello", name)

# Function returning value:
def square(num):
    return num*num

# Function with Default Arguments:
def add(a=2, b=3):
    print("Addition is", a+b)

# Variable Arguments (internally treated as tuples):
def sumc(*args):
    print(type(args))
    s=0
    for i in args:
        s += i
    print(s)

# Positional Arguments:
def mult(a,b,c):
    print(a,b,c)

# Lambda/Anonymous Functions (lamba args : expression):
def lambdaf():
    # Lambda function without argument:
    greet = lambda : print("Hello World")
    print(greet)
    # Lambda function with argument:
    add = lambda a,b : a+b
    print(add(2,3))

# Python Built-in Functions:
def builtin_f():
    print(type("string")) # Returns type of object
    print(len([12,12,12,12,12])) # Returns length of object
    print(bin(2)) # Return binary
    print(min(1,2,3,4,5)) # Return min
    print(max(1,2,3,4,5)) # Return max
    print(sorted("python")) # Return sorted list
    print(sum([1,2,3,4,5])) # Returns sum of iterable objects
    print(hash(1)) # Returns has of value
