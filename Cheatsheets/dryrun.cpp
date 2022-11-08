#include <iostream>
using namespace std;

class MyClass {
    public: // Public access specifier
        int pu;
    private: // Private access specifier
        int pr;
    protected: // Protected access specifier
        int pt;
};

int main(){
    MyClass ob;
    ob.pu = 25; // Allowed (public)
    ob.pr = 50; // Error: Not allowed (private)
    ob.pt = 75; // Error: Not allowed (protected)

    return 0;
}