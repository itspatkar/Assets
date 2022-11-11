#include <iostream>
using namespace std;

class Student {
    private:
        int *ptr;
    public:
        int roll;
        string name;

        // Constructor (parameterized) :
        Student(int r, string n){
            roll = r;
            name = n;
            ptr = new int;
            *ptr = len;
        }
        // Copy Constructor :
        Student(const Student &ob){
            ptr = new int;
            *ptr = *ob.ptr;
        }
        // Destructor :
        ~Student(){
            cout << "Destructor is called." << endl;
            delete ptr;
        }

        void studentInfo(){
            cout << "Roll : " << roll << endl;
            cout << "Name : " << name << endl;
        }
};

int main(){
    Student s1(17, "Mandar");
    s1.studentInfo();

    return 0;
}
