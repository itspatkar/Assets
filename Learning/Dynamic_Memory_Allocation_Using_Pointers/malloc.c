#include<stdio.h>
#include<stdlib.h>

int main(int argc, char const *argv[]){
	int n;

	printf("Enter no of integers: ");
	scanf("%d",&n);

	int *ptr = (int*)malloc(n*sizeof(int));

	if (ptr == NULL){
		printf("Memory not available.");
		exit(1);
	}

	for (int i = 0; i < n; i++){
		printf("Enter integer: ");
		scanf("%d",ptr+i);
	}

	printf("Integers: ");
	for (int i = 0; i < n; i++){
		printf("%d ",*(ptr+i));
	}
	
	return 0;
}
