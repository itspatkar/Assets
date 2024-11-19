package com.experiment7;

public class Experiment7A {
    public static void main(String[] args){
        Experiment7A ob = new Experiment7A();
        StringBuffer str = new StringBuffer("Welcome");

        str.append(" Anish");
        System.out.println("append : "+str);
        str.insert(7," Mr.");
        System.out.println("insert : "+str);
        str.replace(12,17,"Akash");
        System.out.println("replace : "+str);
        System.out.println("length : "+str.length());
        str.delete(8,12);
        System.out.println("indexof : "+str.indexOf("Akash"));
        System.out.println("lastindexof : "+str.lastIndexOf("Welcome"));
        System.out.println("delete : "+str);
        str.setLength(7);
        System.out.println("setlength : "+str);
        str.setCharAt(0,'w');
        System.out.println("setcharat : "+str);
        str.reverse();
        System.out.println("reverse : "+str);
        System.out.println("capacity : "+str.capacity());
        System.out.println("charat : "+str.charAt(3));
        str.deleteCharAt(6);
        System.out.println("deletecharat : "+str);
        System.out.println("getclass : "+str.getClass());
        StringBuffer str2 = new StringBuffer("Welcome");
        System.out.println("compareto : "+str.compareTo(str2));
    }
}
