package program2;

import java.util.Scanner;

class InvalidIntegerException extends Exception {
    public InvalidIntegerException(String s){
        super(s);
    }
}
public class ProgramCE {
    public static void main(String[] args) {
        int x,y;
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter 2 integers :");
        x=sc.nextInt();
        y=sc.nextInt();

        try {
            if( x==0 || y==0)
                throw new InvalidIntegerException("Invalid Integer!, Input must be signed integer");
            else
                System.out.println("Division = "+x/y);
        } catch (InvalidIntegerException e){
            System.out.println(e);
        }
    }
}
