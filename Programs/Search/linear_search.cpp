// Linear Search Algorithm using C++

#include<iostream>
using namespace std;

int i;
bool search(int n){
	int arr[50];

	for (i = 0; i < 50; i++)
		arr[i] = i + 1;

	for (i = 0; i < 50; i++)
		if (arr[i] == n) return true;

	return false;
}

int main(){
	int n;
	bool ind;

	cout << "Enter Number : ";
	cin >> n;
	ind = search(n);
	if (ind == true)
		cout << "Number found at location : " << i << "\nie. array[" << i << "]="<<n<<endl;
	else
		cout << "Number Not Found In Array!\n";

	return 0;
}
