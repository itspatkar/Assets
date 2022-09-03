#include<stdio.h>
#include<stdlib.h>

int *input(){
	// Allocating memory -
	int *ptr = (int*)malloc(5*sizeof(int));

	if (ptr == NULL){
		printf("Memory not available.");
		exit(1);
	}

	printf("Enter 5 integers:\n");	
	for (int i = 0; i < 5; i++){
		printf("Enter integer: ");
		scanf("%d",ptr+i);
	}

	return ptr;
}

int main(int argc, char const *argv[]){
	int sum=0;

	int *ptr = input();

	for (int i = 0; i < 5; i++)
		sum += *(ptr+i);

	printf("Sum = %d",sum);

	// Deallocating/Freeing memory -
	free(ptr);
	ptr=NULL;
	
	return 0;
}
