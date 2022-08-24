#include <stdio.h>

int main(){
	int i = 1, n, sum = 0;
	
	printf("Enter Number : ");
	scanf("%d", &n);
	while (i <= n){
		sum = sum + i;
		i++;
	}
	printf("Sum of Natural No =  %d\n", sum);
	
	return 0;
}
