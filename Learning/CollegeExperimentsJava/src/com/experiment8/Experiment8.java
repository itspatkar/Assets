package com.experiment8;

class A{
    String sA = "This is class A";
}
class B extends A {
    String sB = "This is class B";
}
class C extends B {
    String sC = "This is class C";
    void dispC(){
        System.out.println(sA);
        System.out.println(sC);
    }
}
class D extends B {
    String sD = "This is class D";
    void dispD(){
        System.out.println(sB);
        System.out.println(sD);
    }
}
public class Experiment8 {
    public static void main(String[] args){
        C obc = new C();
        D obd = new D();
        obc.dispC();
        obd.dispD();
    }
}
