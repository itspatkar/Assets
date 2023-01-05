#include <iostream>
using namespace std;

int main(){
	int n, d, r=0;
	
	cout<<"Enter Number : ";
	cin>>n;

	while (n != 0){
		d = n % 10;
		r = r * 10 + d;
		n = n / 10;
	}
	cout<<"Reverse is "<<r<<endl;

	return 0;
}
