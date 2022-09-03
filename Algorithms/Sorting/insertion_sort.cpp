// Insertion Sort Algorithm in C++ : Select current element & compare with all elements on left side

#include<iostream>
using namespace std;

void insertion(int n){
	int i, j, temp, a[n];

	cout << "Enter " << n << " Elements : ";
	for (i = 0; i < n; i++)
		cin >> a[i];

	for (i = 1; i < n; i++){
		temp = a[i];
		j = i - 1;
		while (j >= 0 && a[j] > temp){
			a[j + 1] = a[j];
			j--;
		}
		a[j + 1] = temp;
	}

	cout << "Sorted Array In Ascending Order -" << endl;
	for (i = 0; i < n; i++)
		cout << a[i] << " ";
	cout<<endl;
}

int main(){
	int n;

	cout << "Enter No of Elements : ";
	cin >> n;
	insertion(n);

	return 0;
}
