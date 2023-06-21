# Python Iterators:
""" > Iterator:
- Iterators are methods that iterate collections like lists, tuples, etc.
- Using an iterator method, we can loop through an object and return its elements.
"""
def iterators():
    fruits = ["mango", "apple", "orange", "banana", "melon"]
    iterator = iter(fruits) # Create iterator from list
    print(next(iterator)) # return 1st element from iteration
    print(next(iterator)) # return 2nd element from iteration

    # for loop with iterator:
    iterator = iter(fruits)
    for i in iterator:
        print(i,end=" ")
    print("\n")


# Python Generators:
""" > Generator:
- It is function that returns an iterator that produces a sequence of values when iterated over.
- The generator function is defined using the def keyword, but instead of the return statement it uses yield statement.
"""
def generators():
    def square_gen(n):
        i = 1
        while i <= n:
            yield i*i
            i += 1
    for i in square_gen(5):
        print(i)

    # Generator Expression:
    gen = (i * i for i in range(5))
    for i in range(5):
        print(next(gen))

    # Pipelines with generators:
    def fibbonacci_series(n):
        a, b = 0, 1
        for i in range(n):
            a, b = b, a+b
            yield a
    def square(n):
        for i in n:
            yield i**2

    print(sum(square(fibbonacci_series(10))))


# Python Closures:
""" > Closures:
Python closure is a nested function that allows us to access variables of the outer function
even after the outer function is closed.
"""
def closures():
    def welcome():
        name = "Vinit"
        return lambda: "Hii " + name
    message = welcome()
    print(message())


# Python Decorators:
""" > Decorators:
- Decorator is a design pattern that allows you to modify the functionality of a function
by wrapping it in another function.
"""
def decorators():
    # Returning Function:
    def greet():
        def hello():
            print("Hello World!")
        return hello
    func = greet()
    func()

    # Function as Parameters:
    def square(n):
        return n*n
    def disp(func,n):
        return func(n)
    print(disp(square,2))

    # Decorating Functions with Parameters:
    def divide(x,y):
        return x/y
    def outer_div(func):
        def inner(x,y):
            if x < y:
                x, y = y, x
            return func(x, y)
        return inner
    div = outer_div(divide)
    print(div(2,4))
    # WIP