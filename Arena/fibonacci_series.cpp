// series of no of which first digit is 0, second digit is 2, next n digits are sum of 2 previus no.

#include <iostream>
using namespace std;

int main(){
	int n, a=0, b=1, c;
	
	cout<<"Enter Number : ";
	cin>>n;

	if (n == 1) cout<<a<<endl;
	else if (n == 2) cout<<a<<" "<<b<<endl;
	else {
		cout<<a<<" "<<b;
		for (int i=1; i<=n-2; i++){
			c = a+b;
			cout<<" "<<c;
			a = b;
			b = c;
		}
	}
	cout<<"\n";

	return 0;
}
