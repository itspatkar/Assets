// Calculate factorial ie product of natural no from 1 to n (where n is input).

#include <stdio.h>

int main(){
	int n, f = 1;
	
	printf("Enter Number : ");
	scanf("%d", &n);
	for (int i = 1; i <= n; i++)
		f = f * i;
	printf("Factorial of %d = %d\n", n, f);
	
	return 0;
}
