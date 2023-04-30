#include <iostream>
using namespace std;

int main(){
	int i=2, n;
	bool flag = true;
	
	cout<<"Enter Number : ";
	cin>>n;

	while (i <= n/2){
		if (n%i == 0){
			flag = false;
			break;
		}
		i++;
	}
	if (flag) cout<<n<<" is prime number"<<endl;
	else cout<<n<<" is not prime number"<<endl;

	return 0;
}
