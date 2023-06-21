package com.experiment5;

import java.util.Scanner;

public class Experiment5B {
    String name, f_o_i;
    int roll;

    public static void main(String[] args){
        Experiment5B ob = new Experiment5B();
        Scanner input = new Scanner(System.in);
        System.out.println("Enter your name, roll no and fields of interest respectively:");
        ob.name=input.nextLine();
        ob.f_o_i=input.nextLine();
        ob.roll=input.nextInt();
        System.out.println("Hey, my name is "+ob.name+" and my roll number is "+ob.roll+". My field of interest are "+ob.f_o_i+".");
    }
}
