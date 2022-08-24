#include<iostream>
using namespace std;

int sum(int a){
	if ( a != 0 ) return a + sum(a-1);
	else return 0;
}

int main(){
	int a;

 	cout<<"Enter Number : ";
 	cin>>a;
 	cout<<"Sum of Numbers Is = "<<sum(a)<<endl;

 	return 0;
 }
 