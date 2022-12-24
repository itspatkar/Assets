#include <stdio.h>

//function for factorial
int factorial(int n){
	if(n==1) return 1;
	return n*factorial(n-1);
}

int main(){
	int n,r;
	float ncr=0;

	printf("Enter value of n and r: ");
	scanf("%d%d",&n,&r);
	ncr = factorial(n) / (factorial(r)*factorial(n-r));
	printf("nCr = %f\n",ncr);

	return 0;
}
