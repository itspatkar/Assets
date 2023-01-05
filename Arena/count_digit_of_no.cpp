// Count no of digit in number.

#include <iostream>
using namespace std;

int main(){
	int n, counter=0;
	
	cout<<"Enter Number : ";
	cin>>n;

	while (n != 0){
		n = n/10;
		counter++;
	}
	cout<<"Digits = "<<counter<<endl;
	
	return 0;
}
