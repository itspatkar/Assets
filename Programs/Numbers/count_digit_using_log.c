#include <stdio.h>
#include <math.h>

int main(){
	int n, t;
	
	printf("Enter Number : ");
	scanf("%d", &n);
	t = log10(n) + 1;
	printf("Digit  = %d\n", t);
	
	return 0;
}
