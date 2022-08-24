// series of no of which first digit is 0, second digit is 2, next n digits are sum of 2 previus no.

#include <stdio.h>

int main(){
	int n, a = 0, b = 1, c;
	
	printf("Enter Number : ");
	scanf("%d", &n);
	printf("Fibbonaci Series is :\n");
	if (n == 1) printf("%d ", a);
	else if (n == 2) printf("%d %d ", a, b);
	else
	{
		printf("%d %d ", a, b);
		for (int i = 1; i <= n - 2; i++)
		{
			c = a + b;
			printf("%d ", c);
			a = b;
			b = c;
		}
	}
	printf("\n");

	return 0;
}
