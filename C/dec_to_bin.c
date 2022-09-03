// Convert decimal no to binary

#include <stdio.h>

int main(){
	int n, d, r = 0, t = 1;
	
	printf("Decimal Number : ");
	scanf("%d", &n);
	while (n != 0){
		d = n % 2;
		r = d * t + r;
		n = n / 2;
		t = t * 10;
	}
	printf("Binary = %d\n", r);

	return 0;
}
