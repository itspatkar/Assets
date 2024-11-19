#include<stdio.h>
#include<stdlib.h>

int main(int argc, char const *argv[]){

	int *ptr = (int*)malloc(2*sizeof(int)); // 8 bytes of memory is allocated

	if (ptr == NULL){
		printf("Memory not available.");
		exit(1);
	}

	printf("Enter 2 integers:\n");
	for (int i = 0; i < 2; i++){
		printf("Enter integer: ");
		scanf("%d",ptr+i);
	}
	printf("Integers: ");
	for (int i = 0; i < 2; i++){
		printf("%d ",*(ptr+i));
	}


	ptr = (int*)realloc(ptr,4*sizeof(int)); // 16 bytes of memory is allocated

	if (ptr == NULL){
		printf("Memory not available.");
		exit(1);
	}

	printf("\n\nEnter 2 integers more:\n");
	for (int i = 2; i < 4; i++){
		printf("Enter integer: ");
		scanf("%d",ptr+i);
	}
	printf("Integers: ");
	for (int i = 0; i < 4; i++){
		printf("%d ",*(ptr+i));
	}
	
	return 0;
}
