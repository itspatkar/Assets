// Swapping of two no without using third or temporary variable.

#include <stdio.h>

int main(){
	int a, b;

	printf("Enter 2 number : ");
	scanf("%d%d", &a, &b);
	a = a + b;
	b = a - b;
	a = a - b;
	printf("After Swapping = %d %d\n", a, b);

	return 0;
}
