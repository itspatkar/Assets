#include<iostream>
using namespace std;

int main(){
	int a[10][10], m, n, i, j, sum=0;

	cout<<"Enter row and column of matrix : ";
	cin>>m>>n;

	cout<<"Enter elements of matrix: ";
	for(i=0; i<m; i++)
		for(j=0; j<n; j++)
			cin>>a[i][j];

	cout<<"Matrix is :\n";
	for(i=0; i<m; i++){
		for(j=0; j<m; j++)
			cout<<a[i][j]<<" ";
		cout<<"\n";
	}

	for(i=0; i<m; i++)
		for(j=0; j<n; j++)
			if(i==j) sum=sum+a[i][j];

	cout<<"\nSum of diagonal elements of matrix is "<<sum<<endl;

	return 0;
}
