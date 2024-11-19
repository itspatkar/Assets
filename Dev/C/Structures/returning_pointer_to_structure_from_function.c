#include<stdio.h>
#include<stdlib.h>
#include<string.h>

struct Classroom {
	int roll;
	char name[10];
};

struct Classroom* edit(int r,char n[]){
	/* We use dynamic memory (heap) using malloc instead of stack memory bacause we are going to return address of memory using pointer,
	and stack memory clears after execution of function so the address will be non-existing.
	Therefore we use heap as it does not clears automatically. */
	struct Classroom *ptr = (struct Classroom*)malloc(sizeof(struct Classroom));
	ptr->roll = r;
	strcpy(ptr->name,n);
	return ptr;
}

void print(struct Classroom *c_ptr){
	printf("Name: %s\nRoll: %d\n",c_ptr->name,c_ptr->roll);
}

int main(int argc, char const *argv[]){
	struct Classroom *ptr;
	ptr=edit(17,"Mandar");
	print(ptr);
	free(ptr);

	return 0;
}
