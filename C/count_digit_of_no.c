// Count no of digit in number.

#include <stdio.h>

int main(){
	int n, counter = 0;
	
	printf("Enter Number : ");
	scanf("%d", &n);
	while (n != 0){
		n = n / 10;
		counter++;
	}
	printf("Digit  = %d\n", counter);
	
	return 0;
}
