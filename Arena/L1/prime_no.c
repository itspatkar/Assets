#include <stdio.h>

int main(){
	int i = 2, n, flag = 1;
	
	printf("Enter Number : ");
	scanf("%d", &n);
	while (i < n / 2){
		if (n % i == 0){
			flag = 0;
			break;
		}
		i++;
	}
	if (flag == 1) printf("%d is prime number\n", n);
	else printf("%d is not prime number\n", n);

	return 0;
}
