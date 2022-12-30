#include <iostream>
using namespace std;

class B;

class A {
    private:
        int x;
    public:
        // Constructor :
        A() : x(10){}

    friend void addNum(A, B);
};

class B {
    private:
        int y;
    public:
        // Constructor :
        B() : y(20){}

    friend void addNum(A, B);
};

void addNum(A a, B b){
    cout << "Addition is " << a.x + b.y << endl;
}


int main(){
    A a;
    B b;

    addNum(a,b);

    return 0;
}
