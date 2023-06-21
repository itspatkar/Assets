// Check whether year is leap year or not.

#include <iostream>
using namespace std;

int main(){
	int y;
	
	cout<<"Enter Year : ";
	cin>>y;

	if ((y%4 == 0 && y%100 != 0) || y%400 == 0)
		cout<<y<<" is leap year."<<endl;
	else
		cout<<y<<" is not leap year."<<endl;

	return 0;
}
