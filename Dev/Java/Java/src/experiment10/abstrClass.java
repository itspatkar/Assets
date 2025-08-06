package com.experiment10;

abstract class Bank {
    abstract String accountType();
}
class BOB extends Bank {
    public BOB() {
        System.out.println("Welcome to bank");
    }
    String accountType() {
        return "Saving Account";
    }
}

public class abstrClass {
    public static void main(String[] args){
        BOB ob = new BOB();
        System.out.println("Account Type: "+ob.accountType());
    }
}
