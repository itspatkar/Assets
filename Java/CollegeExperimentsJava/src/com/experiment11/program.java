package com.experiment11;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

class InvalidMarksException extends Exception {
    public InvalidMarksException(String s){
        super(s);
    }
}

public class program {
    public static void main(String[] args) {
        float total=0, marks[] = new float[3];
        try{
            BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
            System.out.println("Enter marks of 3 subjects:");
            for(int i=0;i<3;i++) {
                marks[i] = Float.parseFloat(br.readLine());
                if (marks[i]<0 || marks[i]>50)
                    throw new InvalidMarksException("Invalid Marks, marks must be between 0 and 50");
                total=total+marks[i];
            }
            System.out.println("Percentage= "+(total/150)*100);
        } catch (ArrayIndexOutOfBoundsException e){
            System.out.println(e);
        } catch (IOException e){
            System.out.println(e);
        } catch (ArithmeticException e){
            System.out.println(e);
        } catch (InvalidMarksException e){
            System.out.println(e);
        }
    }
}
