package program1;

public class Triangle {
    Triangle(){
        double a=3,b=4,c=5,s,perimeter,area;
        perimeter=a+b+c;
        s=(a+b+c)/2;
        area=Math.sqrt(s*(s-a)*(s-b)*(s-c));
        System.out.println("Perimeter = "+perimeter);
        System.out.println("Area = "+area);
    }
    public static void main(String[] args) {
        Triangle ob = new Triangle();
    }
}