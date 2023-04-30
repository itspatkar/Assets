import math
import random
import time, datetime, calendar
import sys
import os


# Math Module:
def mod_math():
    print(math.ceil(12.55))
    print(math.floor(12.55))
    print(math.factorial(5))
    print(math.fabs(-7))
    print(math.pow(2,3))
    print(math.modf(3.5))


# Random Module:
def mod_random():
    """ Random nums are actually pseudo nums.
    Random nums are generated for some seed value.
    Default seed value is system time.
    For same seed value, exactly same random nums are generated.
    """
    print(random.random())
    print(random.randint(1,10))
    print(random.randrange(10, 50))
    print(random.choice([12,45,77,15,5]))
    random.seed(10)


# Time Module:
def mod_time():
    time.gmtime()
    time.localtime() # Return time tuple
    time.sleep(1)  # Stop execution for n-sec

    # Datetime:
    print(time.asctime(time.localtime(time.time()))) # Formatted time
    print(datetime.datetime.now()) # Return current date and time
    print(datetime.datetime.now().year)
    print(datetime.datetime.now().year) # Current year
    print(datetime.datetime.now().month) # Current month
    print(datetime.datetime.now().day) # Current day
    print(datetime.datetime.now().hour) # Current hour
    print(datetime.datetime.now().minute) # Current minute
    print(datetime.datetime.now().second) # Current second

    # Calender:
    print(calendar.month(2023,3))


# Sys Module:
def mod_sys():
    print(sys.modules) # Return imported modules
    print(sys.argv) # Return list of cl arguments passed to python script (index 0 is script name)
    print(sys.path) # Return PATH set as environment variable
    print(sys.executable) # Return absolute path to python interpreter
    print(sys.platform) # return platform
    #print(sys.exit()) # exit from current execution


# OS Module:
def mod_os():
    os.getcwd()  # Get current working directory
    #os.mkdir("Folder") # Make directory
    #os.chdir("Folder") # Change directory
    #os.rmdir("Folder") # Remove directory
    #os.rename("Old_Name", "New_Name") # Change name
    #os.remove("file") # Remove file
