// Experiment 1 - B

package com.experiment1;

import java.util.Scanner;

public class Experiment1B {
    public static void main(String[] args){
        int n,t,d,r=0;
        Scanner input = new Scanner(System.in);
        System.out.print("Enter Number : ");
        n=input.nextInt();

        t = n;
        while (t != 0){
            d = t % 10;
            r = r * 10 + d;
            t = t / 10;
        }
        if (n == r) System.out.print(n+" is palindrome number");
        else System.out.print(n+" is not palindrome number");
    }
}
