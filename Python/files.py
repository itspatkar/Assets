""" > File Handling:
Flow: open file > read/write > close file

File Modes:
- r : open for reading (default)
- w : open for writing, create new if not exist and overwrite content of already exist
- x : create new, error if exists
- a : create new, appends content if already exists
- t : open in text mode
- b : open in binary mode
- + : open for reading + writing

"""

def file_handling():
    # Open file:
    file = open("file.txt","r")

    # Reading file:
    content = file.read()
    print(content)

    # Closing file
    file.close()

    # Writing file:
    file = open("file.txt","w")
    file.write("Hello World")
    file.close()

    file = open("file.txt","r")
    content = file.read()
    print(content)
    file.close()
