#include<stdio.h>
#include<string.h>

/* Def: Self referential structures are those structures in which one or
		more pointers points to the structure of same type.

struct self {
	int p;
	struct self *ptr;
}
*/

struct classroom {
	int roll;
	char name[10];
	struct classroom *ptr;
};

int main(int argc, char const *argv[]){
	struct classroom c1;
	struct classroom c2;

	c1.roll=17;
	strcpy(c1.name,"Mandar");
	c1.ptr=NULL;

	c1.ptr=&c1;
	printf("Name: %s\nRoll: %d\n",c1.ptr->name,c1.ptr->roll);

	c2.roll=22;
	strcpy(c2.name,"Kirti");
	c2.ptr=NULL;

	c1.ptr=&c2;
	printf("Name: %s\nRoll: %d\n",c1.ptr->name,c1.ptr->roll);

	return 0;
}
