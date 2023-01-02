#include <stdio.h>

int main(){
	int n, d, r = 0;
	
	printf("Enter Number : ");
	scanf("%d", &n);
	while (n != 0){
		d = n % 10;
		r = r * 10 + d;
		n = n / 10;
	}
	printf("Reverse = %d\n", r);

	return 0;
}
