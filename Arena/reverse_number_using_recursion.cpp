#include <iostream>
using namespace std;

int rev(int n){
	static int sum,r;

	if(n > 0){
		r = n%10;
		sum = sum*10+r;
		rev(n/10);
	} else return 0;

	return sum;
}

int main(){
	int n;

	cout<<"Enter Number : ";
	cin>>n;
	cout<<"Reverse is "<<rev(n)<<endl;

	return 0;
}
