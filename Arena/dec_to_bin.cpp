// Convert decimal number to binary

#include <iostream>
using namespace std;

int main(){
	int n, d, r=0, t=1;
	
	cout<<"Enter Decimal Number : ";
	cin>>n;

	while (n != 0){
		d = n%2;
		r = d*t+r;
		n = n/2;
		t = t*10;
	}
	cout<<"Binary = "<<r<<endl;

	return 0;
}
