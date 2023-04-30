#include <iostream>
using namespace std;

int getPower(int b,int p){
	if(p == 0) return 1;
	else return b*(getPower(b,p-1));
}

int main(){
	int base, power;

	cout<<"Enter Base : ";
	cin>>base;
	cout<<"Enter Power : ";
	cin>>power;
	cout<<base<<" to power "<<power<<" is "<<getPower(base,power)<<endl;

	return 0;
}
