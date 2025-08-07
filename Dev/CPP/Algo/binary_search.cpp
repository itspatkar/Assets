// Binary Search Algorithm : array/list must be sorted.

#include<iostream>
using namespace std;

int mid;

bool binarySearch(int n) {
    int beg, end, i, j, a[100];

    for(int i=0; i<100; i++)
        a[i] = (i+1)*(i+1)+1;

    beg = 0; // first element
    end = 100; // last element

    while(beg <= end) {
        mid = (beg+end)/2;
        if(n == a[mid]){
            return true;
        } else {
            if(n > a[mid])
                beg = mid + 1;
            else
                end = mid - 1;
        }
    }

    return false;
}

int main() {
    int n;

    cout << "Enter Number : ";
    cin >> n;

    if (binarySearch(n))
        cout << "Number found at index " << mid << endl;
    else
        cout << "Not Found" << endl;

    return 0;
}
