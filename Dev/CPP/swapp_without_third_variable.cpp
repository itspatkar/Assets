// Swapping of two no without using third or temporary variable.

#include <iostream>
using namespace std;

int main(){
	int a, b;

	cout<<"Enter A & B : ";
	cin>>a>>b;

	cout<<"Before Swapping:\nA = "<<a<<"\nB = "<<b<<endl;
	a = a + b;
	b = a - b;
	a = a - b;
	cout<<"After Swapping:\nA = "<<a<<"\nB = "<<b<<endl;

	return 0;
}
