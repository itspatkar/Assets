package com.experiment5;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class Experiment5A {
    String name;
    int a,b,c;

    public static void main(String[] args) throws IOException {
        Experiment5A ob = new Experiment5A();
        InputStreamReader r = new InputStreamReader(System.in);
        BufferedReader br = new BufferedReader(r);

        System.out.print("Enter Name:");
        ob.name=br.readLine();
        System.out.println("Enter 3 Number:");
        ob.a=Integer.parseInt(br.readLine());
        ob.b=Integer.parseInt(br.readLine());
        ob.c=Integer.parseInt(br.readLine());

        if(ob.a==ob.b && ob.a==ob.c) System.out.print("Hey, " + ob.name + " three numbers are equal.");
        else if(ob.a==ob.b || ob.b==ob.c || ob.a == ob.c ) System.out.println("Hey, "+ob.name+" two numbers are equal.");
        else System.out.println("Hey, "+ob.name+" no numbers are equal.");
    }
}
