package program1;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class TempConv {
    public static void main(String[] args) throws IOException {
        BufferedReader bf = new BufferedReader(new InputStreamReader(System.in));
        double fahrenheit,celcius;
        System.out.print("Enter temperature in fahrenheit : ");
        fahrenheit=Double.parseDouble(bf.readLine());
        celcius=(fahrenheit-32)/1.8;
        System.out.println("Celcius= "+celcius);
        bf.close();
    }
}