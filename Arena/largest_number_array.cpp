// largest number in array of numbers

#include <iostream>
using namespace std;

int large(int n, int arr[]){
	int larg=0;
	
	for (int i=0; i<n; i++)
		for (int j=0; j<n; j++)
			if (arr[i] > arr[j] && arr[i] > larg)
				larg = arr[i];

	return larg;
}

int main(){
	int n;
	
	cout<<"Enter Size : ";
	cin>>n;

	int arr[n];
	cout<<"Enter "<<" integers : ";
	for (int i=0; i<n; i++)
		cin>>arr[i];
	cout<<"Largest number is "<<large(n, arr)<<endl;

	return 0;
}
