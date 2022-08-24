// Spells each digit of no

#include <stdio.h>

int main(){
	int n, d, r = 0;

	printf("Enter Number : ");
	scanf("%d", &n);
	while (n != 0){
		d = n % 10;
		r = r * 10 + d;
		n = n / 10;
	}
	while (r != 0){
		d = r % 10;
		switch (d){
			case 0:
				printf(" Zero ");
				break;
			case 1:
				printf(" One ");
				break;
			case 2:
				printf(" Two ");
				break;
			case 3:
				printf(" Three ");
				break;
			case 4:
				printf("  Four ");
				break;
			case 5:
				printf(" Five ");
				break;
			case 6:
				printf(" Six ");
				break;
			case 7:
				printf(" Seven ");
				break;
			case 8:
				printf(" Eight ");
				break;
			case 9:
				printf(" Nine ");
				break;
			default:
				printf("Invalid Input!\n");
		}
		r = r / 10;
	}
	printf("\n");

	return 0;
}
