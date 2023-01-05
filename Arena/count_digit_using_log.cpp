#include <iostream>
#include <math.h>
using namespace std;

int main(){
	int n, t;
	
	cout<<"Enter Number : ";
	cin>>n;

	t = log10(n) + 1;
	cout<<"Digit = "<<t<<endl;
	
	return 0;
}
