// Sum & product of digits of number.

#include <stdio.h>

int main(){
	int n, i = 1, d = 1, sum = 0, prod = 1;

	printf("Enter Number : ");
	scanf("%d", &n);
	do
	{
		d = n % 10;
		sum = sum + d;
		prod = prod * d;
		n = n / 10;
		i++;
	} while (n != 0);
	printf("Sum = %d\nProduct = %d\n", sum, prod);

	return 0;
}
