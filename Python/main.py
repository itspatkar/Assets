import basics, functions, modules, exceptions, files, oops, advanced
import derivedtypes as ddtype
# Import only specific module/method from package (from packagename import modulename):
from reverse.reverse import reverse_num


# This is entry point to python script/project:
if __name__ == '__main__':
    # Python Basic:
    basics.io()
    basics.comments()
    basics.namespaces()
    basics.operators()
    basics.casting()
    basics.conditionals()
    basics.loops()

    # Python Functions:
    functions.greet()
    functions.wish("World")
    print(functions.square(4))
    functions.add(5)
    functions.sumc(1,2,3,4,5)
    functions.mult(c=2,b=1,a=3)
    functions.lambdaf()
    functions.builtin_f()

    # Python Derived Date Types:
    ddtype.strings()
    ddtype.lists()
    ddtype.tuples()
    ddtype.sets()
    ddtype.dictionary()

    # Python Built-in Modules:
    modules.mod_math()
    modules.mod_random()
    modules.mod_time()
    modules.mod_sys()
    modules.mod_os()

    # Python Packages:
    print(reverse_num(1234))
    
    # Python Exceptions:
    exceptions.error()
    exceptions.assertion()
    exceptions.user_define_error(16)

    # Python File Handling:
    files.file_handling()

    # Python OOP:
    oops.calling()
    oops.builtin_class_meth()
    oops.builtin_class_prop()
    oops.simple_inherit()
    oops.multilevel_inherit()
    oops.multiple_inherit()
    oops.meth_overriding()
    oops.access_spectifier()

    # Python Advanced Concepts:
    advanced.iterators()
    advanced.generators()
    advanced.closures()