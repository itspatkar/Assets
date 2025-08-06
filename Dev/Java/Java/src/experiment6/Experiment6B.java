package com.experiment6;

import java.util.Scanner;

public class Experiment6B {
    public static void main(String[] args){
        String fname,mname,lname;
        Scanner input = new Scanner(System.in);

        System.out.println("Enter your full name respectivelly :");
        fname=input.nextLine();
        mname=input.nextLine();
        lname=input.nextLine();

        System.out.println(fname.charAt(0)+"."+mname.charAt(0)+". "+lname);
    }
}
