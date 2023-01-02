#include<iostream>
using namespace std;

int main(){
	int a[10][10], t[10][10], m, n, i, j;

	cout<<"Enter rows and columns : ";
	cin>>m>>n;

	cout<<"Enter Matrix :\n";
	for(i=0; i<m; i++)
		for(j=0; j<n; j++)
			cin>>a[i][j];

	cout<<"Matrix is :\n";
	for(i=0; i<m; i++){
		for(j=0; j<n; j++)
			cout<<a[i][j]<<" ";
		cout<<"\n";
	}

	for(i=0; i<m; i++)
		for(j=0; j<n; j++)
			t[j][i] = a[i][j];

	cout<<"\nTranspose of matrix is :\n";
	for(i=0; i<m; i++){
		for(j=0; j<n; j++)
			cout<<t[i][j]<<" ";
		cout<<"\n";
	}

	return 0;
}
