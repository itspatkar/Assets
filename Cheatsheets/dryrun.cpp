#include <iostream>
using namespace std;

inline int max(int a, int b){
    return (a > b) ? a : b;
}

int main(){
    cout << "Max of number is " << max(12,10) << endl;
    return 0;
}
