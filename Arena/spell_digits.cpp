// Spells each digit of number

#include <iostream>
using namespace std;

int main(){
	int n, d, r=0;

	cout<<"Enter Number : ";
	cin>>n;

	while (n != 0){
		d = n % 10;
		r = r * 10 + d;
		n = n / 10;
	}
	while (r != 0){
		d = r % 10;
		switch (d){
			case 0:
				cout<<"Zero ";
				break;
			case 1:
				cout<<"One ";
				break;
			case 2:
				cout<<"Two ";
				break;
			case 3:
				cout<<"Three ";
				break;
			case 4:
				cout<<"Four ";
				break;
			case 5:
				cout<<"Five ";
				break;
			case 6:
				cout<<"Six ";
				break;
			case 7:
				cout<<"Seven ";
				break;
			case 8:
				cout<<"Eight ";
				break;
			case 9:
				cout<<"Nine ";
				break;
			default:
				cout<<"Invalid Input!";
		}
		r = r / 10;
	}
	cout<<"\n";

	return 0;
}
