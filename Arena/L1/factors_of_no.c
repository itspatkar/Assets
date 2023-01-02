#include <stdio.h>
int main(){
	int n;
	
	printf("Enter Number : ");
	scanf("%d", &n);
	printf("Factors of %d : ", n);
	for (int i = 1; i <= n; i++)
		if (n % i == 0) printf("%d ", i);
	printf("\n");

	return 0;
}
