#include<stdio.h>
#include<stdlib.h>

int main(int argc, char const *argv[]){
	int n;

	printf("Enter integer: ");
	scanf("%d",&n);

	int *ptr = (int*)malloc(sizeof(int));
	*ptr = n;

	printf("%d",*ptr);

	return 0;
}
