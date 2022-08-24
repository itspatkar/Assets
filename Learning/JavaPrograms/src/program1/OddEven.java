package program1;

import java.util.Scanner;

public class OddEven {
    public static void main(String[] args) {
        int[] num = new int[10];
        float sumEven=0,sumOdd=0,countEven=0,countOdd=0;
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter 10 numbers :");
        for (int i=0;i<10;i++){
            num[i]=sc.nextInt();
            if (num[i]%2==0) {
                sumEven += num[i];
                countEven++;
            } else {
                sumOdd += num[i];
                countOdd++;
            }
        }
        System.out.println("Odd Average = "+sumOdd/countOdd);
        System.out.println("Even Average = "+sumEven/countEven);
        sc.close();
    }
}
