// Palindrome no is such that reverse of it is equal to no itself.

#include <iostream>
using namespace std;

int main(){
	int n, d, r=0;
	
	cout<<"Enter Number : ";
	cin>>n;

	int t = n;
	while (n != 0){
		d = n%10;
		r = r*10+d;
		n = n/10;
	}
	if (t == r) cout<<t<<" is palindrome number"<<endl;
	else cout<<t<<" is not palindrome number"<<endl;
	
	return 0;
}
