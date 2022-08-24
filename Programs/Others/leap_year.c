// Check if year is leap year or not.

#include <stdio.h>

int main(){
	int y;
	
	printf("Enter Year : ");
	scanf("%d", &y);
	if ((y % 4 == 0 && y % 100 != 0) || y % 400 == 0)
		printf("%d is leap year\n", y);
	else
		printf("%d is not leap year\n", y);

	return 0;
}
