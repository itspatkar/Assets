// Experiment 2 - B

package com.experiment2;

public class Employee {
    int year, salary;
    String name, address;
    void assign(String n,int y,int s, String a){
        name=n;
        address=a;
        year=y;
        salary=s;
    }
    void disp(){
        System.out.println(name+" "+year+"\t\t\t "+salary+"\t "+address);
    }

    public static void main(String[] args){
        System.out.println("Name    Year Of Joining  Salary  Address ");
        Employee ob1 = new Employee();
        ob1.assign("Robert  ",1994,10000,"64C-WallsStreat");
        ob1.disp();
        Employee ob2 = new Employee();
        ob2.assign("Sam     ",2000,20000,"68D-WallsStreat");
        ob2.disp();
        Employee ob3 = new Employee();
        ob3.assign("John    ",1999,30000,"26B-WallsStreat");
        ob3.disp();
    }
}
