
## Programming Paradigm
- A programming paradigm is basically a style or a way of programming — a fundamental approach or methodology to writing and organizing code.
- It defines how you think about problems, structure your code, and solve tasks in a programming language. Different paradigms offer different concepts and tools to design and build software.

### Common Programming Paradigms:
#### Procedural Programming:
- Approach: Focuses on writing procedures or routines (functions) that operate on data.
- Organization: Code is organized as a sequence of steps or instructions.
- Data & Functions: Data and functions are separate; functions manipulate data passed to them.
- State Management: Data is often global or passed explicitly between functions.
- Reusability: Achieved by writing reusable functions or procedures.
- Examples: C, early versions of BASIC, Pascal.
- Advantages:
    - Simple and straightforward for small programs.
    - Easier to follow step-by-step execution.
- Disadvantages:
    - Can become messy and hard to maintain as code grows.
    - Difficult to model real-world entities naturally.
    - Data is less protected — no strict control over who accesses or changes it.

#### Object-Oriented Programming (OOP):
- Approach: Organizes code around objects, which combine data and behavior.
- Organization: Code is grouped into classes, which define objects with attributes (data) and methods (functions).
- Data & Functions: Data and the functions that operate on it are bundled together inside objects.
- State Management: Objects encapsulate state; internal data is protected from outside access unless explicitly exposed.
- Reusability: Achieved through inheritance, polymorphism, and encapsulation.
- Examples: Java, C++, Python, Ruby.
- Advantages:
    - Models real-world entities naturally and intuitively.
    - Encourages modular, reusable, and maintainable code.
    - Better data protection through encapsulation.
    - Polymorphism allows flexible and dynamic method usage.
- Disadvantages:
    - Can be more complex to design upfront.
    - May introduce overhead if not used properly for small/simple tasks.

## Object-Oriented Programming (OOP)

OOP stands for Object-Oriented Programming. It's a programming paradigm based on the concept of objects, which can contain data and code:
- Data in the form of fields (often called attributes or properties)
- Code in the form of procedures (often called methods)

Core Concepts of OOP:
- Class: A blueprint for creating objects. It defines a set of attributes and methods that the created objects will have.
- Object: An instance of a class. It represents an individual entity with actual values for the attributes defined in the class.
- Encapsulation: Bundling data (attributes) and methods that operate on the data into a single unit (class), and restricting access to some of the object's components, usually through access modifiers like private, protected, or public.
- Inheritance: A way to create a new class from an existing class by inheriting attributes and methods, allowing code reuse and the creation of hierarchical relationships.
- Polymorphism: The ability of different classes to be treated as instances of the same class through a common interface. It allows methods to behave differently based on the object that is calling them.
- Abstraction: Hiding complex implementation details and showing only the necessary features of the object.

---

## Summary

### Programming Paradigm
- Procedural or functional programming is a simpler approach where the code or problem is divided into functions or procedures, whereas in the OOP paradigm, the problem or code is modeled using real-world entities as objects.
- In the procedural paradigm, variables and functions are not closely associated or bound together.
- In OOP, variables (attributes) and methods (behavior) are closely associated and bound together, which is called data binding (or encapsulation).
- In OOP, variables are not modified directly; instead, methods are created that are bound to the variables and used with objects to change their values.
- OOP provides better real-life simulation, code reusability, maintainability, and security compared to other programming paradigms.

### OOP
#### What is OOP?
- Basically, OOP models a problem or code as real-life entities by creating attributes (variables) and behaviors (methods) around them.
- For example, consider an animal that has eyes, legs, and ears, and can perform actions such as seeing, walking, and listening.
- Here, eyes, legs, and ears are attributes (variables) that are bound together with behaviors (methods). For instance, the animal walks using its legs, meaning the walk method uses the legs attribute, and these are encapsulated together within the object.
- Instead of using functions where variables are not bound to the functions, we use OOP, where both variables and functions are associated together, making the approach clearer and better modeled.

#### What is Class and Object?
- As we see, OOP is based on real life. Consider an animal as an entity that has legs, ears, and eyes, and can perform actions like walking, eating, and seeing.
- If I ask you, what is the blueprint for an animal? — it is an entity that has legs, ears, eyes, and can walk, eat, and see.
- This blueprint for creating animals is called a class.
- This blueprint is used to create an entity, which is an animal; each entity created from the blueprint is called an object.
- Therefore, a class is a blueprint, and an object is an entity (also called an instance) created from the class.
- All the data (i.e., variables) and methods are bound to an object. The object is used to access and modify the data. In simple terms, an object binds variables and methods together which is called as encapsulation or data binding.
- This also hides implementation details because we use specific methods to access and modify data instead of accessing variables directly, which increases security. This is called data abstraction — hiding unnecessary implementation details from the user and showing only the essential features.
