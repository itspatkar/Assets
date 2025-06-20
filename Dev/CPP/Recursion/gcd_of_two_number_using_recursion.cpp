#include <iostream>
using namespace std;

// Recursive approach of Euclidean Algorithm to find GCD of two numbers -
int gcd(int a, int b){
	if(b == 0) return a;
	else return gcd(b, a%b);
}

int main(){
	int num1, num2, hcf;

	cout<<"Enter 2 Numbers : ";
	cin>>num1>>num2;
	hcf = gcd(num1, num2);
	cout<<"GCD of "<<num1<<" and "<<num2<<" is "<<hcf<<endl;

	return 0;
}
