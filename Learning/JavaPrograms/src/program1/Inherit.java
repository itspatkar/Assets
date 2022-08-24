package program1;
class Shape {
    void printShape(){
        System.out.println("This is shape");
    }
}
class Circle extends Shape {
    void printCir(){
        System.out.println("This is circular shape");
    }
}
class Rectangle extends Shape {
    void printRect(){
        System.out.println("This is rectangular shape");
    }
}
class Square extends Rectangle {
    void printSqr(){
        System.out.println("Square is rectagle");
    }
}
public class Inherit {
    public static void main(String[] args) {
        Square ob = new Square();
        ob.printShape();
        ob.printRect();
    }
}