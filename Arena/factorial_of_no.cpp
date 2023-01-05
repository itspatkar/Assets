// Factorial is product of natural no from 1 to n (where n is input).

#include <iostream>
using namespace std;

int main(){
	int n, f=1;
	
	cout<<"Enter Number : ";
	cin>>n;

	for (int i=1; i<=n; i++)
		f = f*i;
	cout<<"Factorial is "<<f<<endl;
	
	return 0;
}
