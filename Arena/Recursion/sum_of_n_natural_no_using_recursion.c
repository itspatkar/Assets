#include <stdio.h>

int sum(int n){
	if(n != 0) return n + sum(n-1);
	else return n;
}

int main(){
	int num;

	printf("Enter Positive Integer : ");
	scanf("%d", &num);
	printf("Sum = %d\n",sum(num));

	return 0;
}
