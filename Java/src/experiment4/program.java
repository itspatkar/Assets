package com.experiment4;

import com.experiment4.calc.*;

public class program {
    public static void main(String[] args){
        int a=25,b=5;
        operations ob = new operations();

        System.out.println("Addition= "+ob.add(a,b));
        System.out.println("Substraction= "+ob.sub(a,b));
        System.out.println("Multiplication= "+ob.mul(a,b));
        System.out.println("Division= "+ob.div(a,b));
        System.out.println("Square Root= "+Math.sqrt(a));
        System.out.println("Power= "+Math.pow(b,2));
        System.out.println("Maximum= "+Math.max(a,b));
        System.out.println("Minimum= "+Math.min(a,b));
    }
}
