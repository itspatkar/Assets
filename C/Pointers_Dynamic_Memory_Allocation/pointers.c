#include<stdio.h>
#include<stdlib.h>

int main(int argc, char const *argv[]){
	
	int *ptr; //This is wild pointer as its uninitilized and pointing to arbitrary memory location
	printf("%d\n", *(int*)ptr);

	ptr = NULL; //This is NULL pointer

	int n=10;
	void *vptr = &n; //This is void pointer as it dont have associated data type with it
	printf("%d\n", *(int*)vptr);

	ptr = (int*)malloc(sizeof(int));
	*ptr = 15;
	printf("%d\n", *(int*)ptr);
	free(ptr);
	printf("%d\n", *(int*)ptr); //This ptr is dangling pointer as it pointing to non-existing memory location

	return 0;
}
