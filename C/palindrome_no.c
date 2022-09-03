// Palindrome no is such that reverse of it is equal to no itself.

#include <stdio.h>

int main(){
	int n, d, r = 0;
	
	printf("Enter Number : ");
	scanf("%d", &n);
	int t = n;
	while (n != 0){
		d = n % 10;
		r = r * 10 + d;
		n = n / 10;
	}
	if (t == r) printf("%d is palindrome number\n", t);
	else printf("%d is not palindrome number\n", t);
	
	return 0;
}
