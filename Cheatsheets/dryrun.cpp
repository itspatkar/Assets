#include <iostream>
using namespace std;

class Name {
public:
    // printm is method
    void printm(string name){
        cout << name << endl;
    }
};

// printf is function
void printf(string name){
    cout << name << endl;
}

int main(){
    Name ob;
    // printm is method
    ob.printm("Mandar");

    // printf is function
    printf("Mandar");

    return 0;
}