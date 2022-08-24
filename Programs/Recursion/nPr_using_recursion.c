#include <stdio.h>

//function for factorial
int factorial(int n){
	if(n==1) return 1;
	return n*factorial(n-1);
}

int main(){
	int n,r;
	float npr=0;

	printf("Enter value of n and r: ");
	scanf("%d%d",&n,&r);
	npr=factorial(n)/factorial(n-r);
	printf("nPr is = %f\n",npr);

	return 0;
}
