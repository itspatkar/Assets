// Armstrong number of n digits is integer such that sum of nth power of its each digits is equal to the number itself.

#include <iostream>
#include <math.h>
using namespace std;

int main(){
    int n, d, c=0, t=0, k;

    cout<<"Enter Number : ";
    cin>>n;
    
    k = n;
    while (n != 0){
        c++;
        d = n%10;
        n = n/10;
    }
    n = k;
    while (n != 0){
        d = n%10;
        t = t + pow(d, c);
        n = n/10;
    }
    if (k == t) cout<<k<<" is armstrong number"<<endl;
    else cout<<k<<" is not armstrong number"<<endl;
    
    return 0;
}
