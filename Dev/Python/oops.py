"""
NOTE: Python doesn't allow constructor overloading.
"""

# Class Definition (creation):
class Student:
    ob_count = 0
    school_name = "Kendriya Vidyalaya"

    # Constructors:
    def __init__(self, roll, name):
        self.roll = roll
        self.name = name
        Student.ob_count += 1

    def get_school(self):
        return self.school_name
    def get_name(self):
        return self.name
    def get_roll(self):
        return  self.roll


# Creating instance/object:
s1 = Student(10,"Vinit")
s2 = Student(12,"Sumit")


# Calling methods:
def calling():
    print(s1.get_school())
    print(s1.get_name())
    print(s1.ob_count)


# Deleting object:
del s2


# Built-in Class Methods:
def builtin_class_meth():
    """ > Objects:
    - isinstance(type,obj) : returns true if object is instance of type
    - issubclass(subclass,class) : returns true if subclass is of class

    > Attributes:
    - getattr(obj,attr_str): get value of attribute
    - setattr(obj,attr_str,value): set value of attribute
    - delattr(obj,attr_str) : delete attribute
    - hasattr(obj,attr_str) : returns true if object contains attribute
    """
    print(isinstance(12, int))
    school = getattr(s1, "school_name")
    print(school)
    setattr(s1,"school_name","Central School")
    print(s1.school_name)
    is_aval = hasattr(s1,"roll")
    print(is_aval)
    delattr(s1,"roll")
    is_aval = hasattr(s1,"roll")
    print(is_aval)


# Built-in Class Properties:
def builtin_class_prop():
    """
    __dict__ : returns dictionary containing class namespace
    __doc__ : returns string with class documentation
    __class__ : returns class name
    __module__ : returns module name
    """
    print(s1.__dict__)
    print(s1.__class__)
    print(s1.__module__)


# Inheritance:
## Simple Inheritance:
class Shape:
    def get_shape(self):
        print("This is shape")

class Rectangle(Shape):
    def get_rect(self):
        print("This is rectangle")

def simple_inherit():
    rect = Rectangle()
    rect.get_shape()
    rect.get_rect()

## Multi-level Inheritance:
class Square(Rectangle):
    def get_sqr(self):
        print("This is square")

def multilevel_inherit():
    sq = Square()
    sq.get_shape()
    sq.get_rect()
    sq.get_sqr()

## Multiple Inheritance:
class Circle(Shape):
    def get_cir(self):
        print("This is circle")

class Cylinder(Rectangle, Circle):
    def get_cylin(self):
        print("This is cuboid")

def multiple_inherit():
    cub = Cylinder()
    cub.get_rect()
    cub.get_cir()
    cub.get_cylin()


# Method Overriding:
class Vehicle:
    def no_of_wheels(self):
        print("None")

class Car(Vehicle):
    def no_of_wheels(self):
        print("4 Wheels")
    def base_no_of_wheels(self):
        # super() method is used to call methods of super/base class.
        super().no_of_wheels()

def meth_overriding():
    car = Car()
    car.no_of_wheels()
    car.base_no_of_wheels()


# Access Modifier:
"""
Public: name
Protected: _name
Private: __name
"""
class Employee:
    __salary = 0
    def get_salary(self):
        return self.__salary
    def set_salary(self,sal):
        self.__salary = sal

def access_spectifier():
    emp = Employee()
    try:
        print(emp.__salary)
    except AttributeError:
        emp.set_salary(45000)
        print("Salary is Rs.", emp.get_salary())
