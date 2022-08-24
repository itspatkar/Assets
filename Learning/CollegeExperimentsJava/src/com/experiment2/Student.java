// Experiment 2 - A

package com.experiment2;

public class Student {
    int roll_no;
    int contact_no;
    String name;
    void assign(String s, int r,int c){
        name=s;
        roll_no=r;
        contact_no=c;
    }
    void disp(){
        System.out.println("Name : "+name);
        System.out.println("Roll NO : "+roll_no);
        System.out.println("Contact NO : "+contact_no);
    }

    public static void main(String[] args){
        Student ob1 = new Student();
        ob1.assign("Mandar",34,1234567890);
        ob1.disp();
        Student ob2 = new Student();
        ob2.assign("Shubham",35,1234567891);
        ob2.disp();
        Student ob3 = new Student();
        ob3.assign("Ratnadip",43,1234567892);
        ob3.disp();
    }
}
