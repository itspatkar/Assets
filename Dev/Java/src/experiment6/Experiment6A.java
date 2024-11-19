package com.experiment6;

import java.util.Scanner;

public class Experiment6A {
    public static void main(String[] args){
        boolean flagT=true,flagS=true,flagD=true;
        int trace=0;
        int[][] matrix = new int [3][3];
        int[][] transpose = new int [3][3];
        Scanner in = new Scanner(System.in);
        for (int i=0;i<3;i++)
            for (int j=0;j<3;j++)
                matrix[i][j]=in.nextInt();

        for (int i=0;i<3;i++) {
            for (int j = 0; j < 3; j++) {
                transpose[j][i] = matrix[i][j];
                if (transpose[j][i] != matrix[i][j]) flagT=false;
                if (transpose[i][j] != -matrix[i][j]) flagS=false;
                while(i != j){
                    if(matrix[i][j] != 0) flagD=false;
                    break;
                }
                while(i == j){
                    trace=trace+matrix[i][j];
                    break;
                }
            }
        }

        if(flagT) System.out.println("Is Symmetric Matrix");
        else System.out.println("Is Not Symmetric Matrix");
        if(flagS) System.out.println("Is Skew Symmetric Matrix");
        else System.out.println("Is Not Skew Symmetric Matrix");
        if(flagD) System.out.println("Is Diagonal Matrix");
        else System.out.println("Is Not Diagonal Matrix");

        System.out.println("Trace of matrix = "+trace);



    }
}
