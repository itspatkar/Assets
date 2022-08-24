package program2;
abstract class Animals {
    abstract void cats();
    abstract void dogs();
}
class Cats extends Animals {
    void cats(){
        System.out.println("Cats meow");
    }
    void dogs(){
        System.out.println("Dogs bark");
    }
}
class Dogs extends Animals {
    void dogs(){
        System.out.println("Dogs bark");
    }
    void cats(){
        System.out.println("Cats meow");
    }
}
public class AbstractClass {
    public static void main(String[] args) {
        Cats obC = new Cats();
        obC.cats();
        Dogs obD = new Dogs();
        obD.dogs();
    }
}