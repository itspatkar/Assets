#include <iostream>
using namespace std;

int countDigits(int n){
	static int count;
 
	if(n > 0){
		count++;
		countDigits(n/10);
	} else return 0;
	
	return count;
}

int main(){
	int n;

	cout<<"Enter Number : ";
	cin>>n;
	cout<<"Digits = "<<countDigits(n)<<endl;

	return 0;
}
