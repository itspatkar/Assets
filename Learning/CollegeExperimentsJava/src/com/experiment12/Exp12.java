package com.experiment12;

class Thr extends Thread {
    public void run(){
        for (int i=1;i<=3;i++){
            System.out.println("/");
            System.out.println("*");
            Thread.yield();
        }
    }
}

public class Exp12 {
    public static void main(String[] args) {
        Thr t1 = new Thr();
        Thr t2 = new Thr();
        t1.start();
        t2.start();
    }
}
