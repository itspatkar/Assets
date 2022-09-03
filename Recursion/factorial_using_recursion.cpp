#include<iostream>
using namespace std;

int fact(int b){
	if ( b == 0 ) return 1;
	else return (b*fact(b-1));
}

int main()
{
	int a;
	
	cout<<"Enter Number : ";
	cin>>a;
	cout<<"Factorial Of "<<a<<" is = "<<fact(a)<<endl;
	
	return 0;
}
	