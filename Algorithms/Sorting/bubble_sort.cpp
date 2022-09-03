// Bubble Sort Algorithm in C++ : Compare & Swapp | N of pass = n-1

#include<iostream>
using namespace std;

void bubble(int n){
	int i, j, t, a[n];

	cout << "Enter " << n << " Elements : ";
	for (i = 0; i < n; i++)
		cin >> a[i];

	for (i = 0; i <= n - 1; i++){
		for (j = 0; j <= n - 1; j++){
			if (a[i] < a[j]){
				t = a[i];
				a[i] = a[j];
				a[j] = t;
			}
		}
	}
	
	cout << "Sorted Array in Ascending Order :" << endl;
	for (i = 0; i < n; i++)
		cout << a[i] << " ";
	cout<<endl;
}

int main()
{
	int n;

	cout << "Enter Number of Element : ";
	cin >> n;
	bubble(n);

	return 0;
}
