// Experiment 3 - A

package com.experiment3A;

public class Student {
    String name, address;
    int age;
    Student(){
        name="unknown";
        age=0;
        address="not available";
    }
    void setInfo(String n, int a){
        name=n;
        age=a;
    }
    void setInfo(String n, int a, String adr){
        name=n;
        age=a;
        address=adr;
    }
    public static void main(String[] args){
        Student s1 = new Student();
        s1.setInfo("Viraj",17);
        System.out.println("Name: "+s1.name+"\nAge: "+s1.age);
        Student s2 = new Student();
        s2.setInfo("Anish",18,"Vasai");
        System.out.println("\nName: "+s2.name+"\nAge: "+s2.age+"\nAddress: "+s2.address);
        Student s3 = new Student();
        s3.setInfo("Viki",16,"Palghar");
        System.out.println("\nName: "+s3.name+"\nAge: "+s3.age+"\nAddress: "+s3.address);
    }
}
