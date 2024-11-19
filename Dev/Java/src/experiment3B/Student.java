// Experiment 3 - B

package com.experiment3B;

public class Student {
    String name;
    Student(){
        name="unknown";
    }
    Student(String n){
        name=n;
    }

    public static void main(String[] args){
        Student ob = new Student();
        System.out.println("Name: "+ob.name);
        Student ob2 = new Student("Anish");
        System.out.println("Name: "+ob2.name);
    }
}
