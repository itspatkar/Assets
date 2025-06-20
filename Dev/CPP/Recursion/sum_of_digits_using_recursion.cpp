#include <iostream>
using namespace std;

int sumDigits(int n){
	static int sum;

	if(n > 0){
		sum += (n%10);
		sumDigits(n/10);
	} else return 0;

	return sum;
}

int main(){
	int n;

	cout<<"Enter Number : ";
	cin>>n;
	cout<<"Sum of digits is "<<sumDigits(n)<<endl;

	return 0;
}
