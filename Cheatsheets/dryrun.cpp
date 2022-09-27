#include <iostream>
#include <cstring>
using namespace std;


struct Classroom {
    int roll;
    char name[10];
    struct Classroom *ptr;
};

int main(){
    struct Classroom c1 = { 17, "Mandar", NULL};

    c1.ptr=&c1;
    cout << "Roll: "<<c1.ptr->roll << "\nName: "<< c1.ptr->name;

    return 0;
}
