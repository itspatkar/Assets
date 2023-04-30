// Neosoft: Find 1st and 2nd number of N-Bonacci Series having 4 numbers.

#include<iostream>
using namespace std;

void NBonacci(int X, int Y){
    int A, B; // 1st & 2nd numbers
    B = X-Y;
    A = Y-B;
    
    cout << B << "\n" << A;
}

int main(){
    int X, Y; // 3rd & 4th numbers
    cin>>X>>Y;
    NBonacci(X,Y);

    return 0;
}
