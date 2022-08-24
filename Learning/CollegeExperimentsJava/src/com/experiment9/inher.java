package com.experiment9;

interface parentA {
    default void disp(){
        System.out.println("This is parent A");
    }
}
interface parentB {
    default void disp(){
        System.out.println("This is parent B");
    }
}

class child implements parentA, parentB {
    public void disp(){
        System.out.println("This is child");
        parentA.super.disp();
        parentB.super.disp();
    }
}

public class inher {
    public static void main(String[] args){
        child ob = new child();
        ob.disp();
    }
}
