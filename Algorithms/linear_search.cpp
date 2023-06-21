// Linear Search Algorithm: linearly search for occurance of element in array/list.

#include<iostream>
using namespace std;

int i;

bool linearSearch(int n) {
    int a[50];

    for(i=0; i<50; i++)
        a[i] = (i+1)*(i+1)+1;

    for(i=0; i<50; i++)
        if(a[i] == n) return true;

    return false;
}

int main() {
    int n;
    
    cout << "Enter Number : ";
    cin >> n;

    if(linearSearch(n))
        cout << "Number found at index " << i << endl;
    else
        cout << "Not Found" << endl;

    return 0;
}
