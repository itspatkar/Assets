#include <iostream>
using namespace std;

int factorial(int n){
	if(n == 1) return 1;
	return n*factorial(n-1);
}

int main(){
	int n, r;
	float ncr=0;

	cout<<"Enter value of n and r: ";
	cin>>n>>r;

	ncr = factorial(n)/(factorial(r)*factorial(n-r));
	cout<<"nCr = "<<ncr<<endl;

	return 0;
}
