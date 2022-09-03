// Experiment 1 - A

package com.experiment1;

import java.util.Scanner;

public class Experiment1A {
    public static void main(String[] args){
        int year;
        Scanner input = new Scanner(System.in);
        System.out.print("Enter Year : ");
        year=input.nextInt();

        if ( (year % 4 == 0 && year % 100 != 0) || year % 400 == 0 ){
            System.out.print(year+" is leap year");
        } else{
            System.out.print(year+" is not leap year");
        }
    }
}
