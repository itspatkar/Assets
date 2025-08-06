// Sum & product of digits of number.

#include <iostream>
using namespace std;

int main(){
	int n, i=1, d=1, sum=0, prod=1;

	cout<<"Enter Number : ";
	cin>>n;

	do{
		d = n%10;
		sum = sum+d;
		prod = prod*d;
		n = n/10;
		i++;
	} while (n != 0);
	cout<<"Sum of digits is "<<sum<<endl;
	cout<<"Product of digits is "<<prod<<endl;

	return 0;
}
