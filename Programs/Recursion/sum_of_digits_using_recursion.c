#include <stdio.h>

int sumDigits(int n){
	static int sum;

	if(n>0){
		sum+=(n%10);
		sumDigits(n/10);
	} else return 0;

	return sum;
}

int main(){
	int n;

	printf("Enter Positive Integer : ");
	scanf("%d",&n);
	printf("Sum of digits = %d\n",sumDigits(n));

	return 0;
}
