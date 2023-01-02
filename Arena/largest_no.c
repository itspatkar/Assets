// print largest no in array of numbers.

#include <stdio.h>

int largef(int n, int arr[]){
	int largn = 0;
	
	for (int i = 0; i < n; i++)
		for (int j = 0; j < n; j++)
			if (arr[i] > arr[j] && arr[i] > largn)
				largn = arr[i];

	return largn;
}

int main(){
	int n;
	
	printf("Enter Size of Array : ");
	scanf("%d", &n);
	int arr[n];
	printf("Enter %d integers : ", n);
	for (int i = 0; i < n; i++)
		scanf("%d", &arr[i]);
	printf("Largest No = %d\n", largef(n, arr));

	return 0;
}
