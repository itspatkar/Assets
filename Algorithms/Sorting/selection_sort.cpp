// Selection Sort Algorithm in C++ : Selecting smallest element & swap with other then storing location of min

#include<iostream>
using namespace std;

void selection(int n){
	int i,j,min,ind,temp,a[n];

	cout<<"Enter "<<n<<" Elements : ";
	for(i=0;i<n;i++)
		cin>>a[i];

	for (i=0;i<=n-1;i++){
		min=a[i];
		ind=i;
		for (j=i+1;j<=n-1;j++){
			if (min>a[j]){
				min=a[j];
				ind=j;
			}
		}
		temp=a[i];
		a[i]=a[ind];
		a[ind]=temp;
	}
	
	cout<<"\nSorted Array in Ascending Order -"<<endl;
	for (i=0;i<n;i++)
		cout<<a[i]<<" ";
	cout<<endl;
}

int main(){
	int n;

	cout<<"Enter No of Element : ";
	cin>>n;
	selection(n);

	return 0;
}
