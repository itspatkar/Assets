# Exception Handling:
def error():
    # Try-Except:
    try:
        print(2/0)
    except:
        print("Number cannot be divisible by zero...!")

    # Try-Except-Else:
    try:
        print(2/1)
    except:
        print("Number cannot be divisible by zero...!")
    else:
        print("No Error Reported.")

    # Try-Except-Finally:
    try:
        print(2/0)
    except ZeroDivisionError:
        print("Number cannot be divisible by zero...!")
    finally:
        print("Error Reported.")

    # Try-Except-Else-Finally:
    try:
        print(2/0)
    except:
        print("Number cannot be divisible by zero...!")
    else:
        print("No Error Reported.")
    finally:
        print("Error Reported.")

    # Raise Error (defined exceptions):
    try:
        a = int(input("Enter Dividend :"))
        b = int(input("Enter Divisor :"))
        if a <= 0 or b <= 0:
            raise ValueError
        if b == 0:
            raise ZeroDivisionError
    except ValueError:
        print("Number cannot be zero...!")
    except ZeroDivisionError:
        print("Divisor cannot be zero..!")

    # Exception Message:
    try:
        raise ZeroDivisionError("Divisor cannot be zero...!")
    except ZeroDivisionError as E:
        print(E)


# Assertion:
def assertion():
    """ > Assert Keyword:
    Syntax: assert [condition], [statement if false]
    - It is used for testing/debugging/checking condition
    - It is boolean expression if true execution continue,
    - If false then throw AssertionError
    """
    try:
        age = int(input("Enter Age :"))
        assert age >= 18, "Assertion Error: Your too young...!"
    except AssertionError as AE:
        print(AE)


# User-Defined Exceptions:
class InvalidAgeException(Exception):
    "Invalid Age : Age should be less thar or equal to 18...!"
    pass

def user_define_error(age):
    try:
        if age < 18:
            raise InvalidAgeException
        else:
            print("Eligibile")
    except InvalidAgeException:
        print("Invalid Age : Age should be less thar or equal to 18...!")
