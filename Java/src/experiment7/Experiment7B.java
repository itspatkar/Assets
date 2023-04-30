package com.experiment7;
import java.util.Vector;

public class Experiment7B {
    public static void main(String[] args){
        Vector vt = new Vector();
        vt.add("mango");
        vt.add("orange");
        System.out.println("add : "+vt);
        vt.addElement("apple");
        System.out.println("addElement : "+vt);
        System.out.println("capicity : "+vt.capacity());
        System.out.println("size : "+vt.size());
        vt.insertElementAt("banana",2);
        System.out.println("insertElementAt : "+vt);
        System.out.println("elementAt : "+vt.elementAt(1));
        System.out.println("get : "+vt.get(2));
        System.out.println("firstElement : "+vt.firstElement());
        System.out.println("lastElement : "+vt.lastElement());
        System.out.println("indexOf : "+vt.indexOf("apple"));
        System.out.println("contains : "+vt.contains("watermelon"));
        vt.remove("apple");
        System.out.println("isEmpty : "+vt.isEmpty());
        System.out.println("remove (\"apple\" removed) : "+vt);
        System.out.println("clone : "+vt.clone());
        vt.clear();
        System.out.println("clear : "+vt);

    }
}
