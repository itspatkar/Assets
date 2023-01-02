#include <stdio.h>

// Recursive approach of Euclidean Algorithm to find GCD of two numbers -
int gcd(int a, int b){
	if(b == 0) return a;
	else return gcd(b, a%b);
}

int main(){
	int num1, num2, hcf;

	printf("Enter 2 Numbers : ");
	scanf("%d%d", &num1, &num2);
	hcf = gcd(num1, num2);
	printf("GCD of %d and %d = %d\n", num1, num2, hcf);

	return 0;
}
