
def strings():
    str = "Python"
    print("Hello" + "World") # String concatenation
    print(str * 2) # Repeat string twice
    print(str[0]) # Indexing
    print(len(str)) # String length
    print(str[0:3]) # Slicing: Pyt
    print(str[:4]) # Pyth
    print(str[5:]) # n

    # Built-in String functions: (doesn't modify string but returns new string)
    str.capitalize() # Python
    str.lower() # python
    str.upper() # PYTHON
    str.replace("Python", "Python3") # Replaces "Python" with "Python3"
    str.lstrip() # Strips whitespaces from left
    str.rstrip() # Strips whitespaces from right
    str.strip() # Strips whitespaces from left & right
    str.startswith("Py") # Returns true of string starts with Py
    str.endswith("Py") # Returns true of string ends with Py
    str.find("Py") # Returns index position if found here 9

    # String check:
    str.isalpha() # Returns true if alpha
    str.isnumeric() # Returns true if all numeric
    str.isalnum() # Returns true if alpha-numeric
    str.isdecimal() # Returns true if all decimal
    str.isdigit() # Returns true if all digits
    str.islower() # Returns true if lower
    str.isupper() # Returns true if upper

    # Iterating string:
    for i in str:
        print(i)


def lists():
    """ > Lists:
    Lists are same as arrays but it can contain multiple types of data
    Lists are mutable, ordered, iterable and can sliced, indexed(-ve rl), concatenated, repeated
    Can be test for membership.
    """
    lang = ["Python", "C++", "Java", "Shell"]
    print(lang)
    lang[3] = "BASH" # Indexing
    lang[0:2] = ["Python3", "C++14"] # Multiple assign
    print(len(lang)) # Length of list
    lang.append("C") # Add element at end
    lang.extend(["JS", "PHP", "Solidity"]) # Extend list by appending another list
    print(lang)
    lang.insert(5,"Javascript") # Insert element at specified position
    lang.remove("Solidity") # Remove element from list
    lang.pop(4) # Remove element at specified index
    lang.index("Java") # Returns index of specified element
    lang.count("PHP") # Returns the count of specified element in list
    lang.reverse() # Reverse the order of elements in list
    lang.sort() # Sort the list in ascending order
    lang.sort(reverse=True) # Sort the list in descending order
    print(lang)
    lang.clear() # Clears the list


def tuples():
    """ > Tuples:
    Tuples are same as lists but it can't be modify (Immutable)
    Tuples are immutable, ordered, iterable and can be sliced, indexed(-ve rl), concatenated, repeated
    Can be test for membership.
    """
    num = (1, 2, 3, 4, 5, 5)
    print(num)
    print(num[2]) # Indexing
    print(num[2:4]) # Slicing
    print(num.index(4)) # Returns index of specified element
    print(num.count(5)) # Returns the count of specified element in tuple


def sets():
    """ > Sets:
    Sets are unordered collection of unique elements with multiple data type.
    Sets are mutable, unordered, iterable and unique.
    It can't contain mutable elements like lists, sets or dictionaries.
    To create empty sets we use set() method with no argument as emtpy curly braces wil create empty dictionary.
    """
    alpha = { "a", "e", "i", "o", "u" }
    print(alpha)
    alpha.add("b") # Add elements in the set
    alpha.update(["c", "d", "f", "g"]) # Update set with elements of other collection types
    alpha.remove("g") # Remove specified element from set
    alpha.pop() # Removes element from set randomly
    alpha.discard("f") # Remove specified element from set, no error if not exist
    print(alpha)
    alpha.clear() # Clears the set

    # Set Operations:
    A = {1, 2, 3, 4, 5}
    B = {4, 5, 6, 7, 8}
    A.union(B) # Returns union of sets : A | B
    A.intersection(B) # Returns intersection of sets : A & B
    A.difference(B) # Returns difference between two sets : A - B
    A.symmetric_difference(B) # Returns all the unique elements of sets


def dictionary():
    """ > Dictionary:
    Dictionary is set of key-value pair of items.
    Key is immutable primitive data type and value is python object (mutable).
    Dictionary is mutable, unordered, iterable (key is iterator)
    """
    capitals = {
        "Maharashtra" : "Mumbai",
        "UttarPradesh" : "Lucknow",
        "Delhi" : "Delhi",
        "Karnataka" : "Bengaluru",
        "Gujrat" : "Gandhinagar"
    }
    print(capitals)
    print(capitals["Maharashtra"]) # Returns value of specified key
    capitals["Rajashtan"] = "Jaipur"
    capitals["Delhi"] = "New Delhi" # Change value associated with key
    capitals.get("UttarPradesh") # Returns value of specified key
    capitals.pop("Delhi") # Remove element associated with key
    capitals.keys() # Return all keys
    capitals.values() # Return all values
    capitals.clear() # Clears all the elements

    # Iterating using items():
    for key,value in capitals.items():
        print(key, value)
