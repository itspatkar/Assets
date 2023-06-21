#include <iostream>
using namespace std;

int factorial(int n){
	if(n == 1) return 1;
	return n*factorial(n-1);
}

int main(){
	int n, r;
	float npr=0;

	cout<<"Enter value of n and r: ";
	cin>>n>>r;

	npr = factorial(n)/factorial(n-r);
	cout<<"nPr is = "<<npr<<endl;

	return 0;
}
