#include<stdio.h>
#include<string.h>

/* Def: Self referential structures are those structures in which one or
		more pointers points to the structure of same type.

struct self {
	int p;
	struct self *ptr;
}
*/

struct Classroom {
	int roll;
	char name[10];
	struct Classroom *ptr;
};

int main(int argc, char const *argv[]){
	struct Classroom c1;
	struct Classroom c2;

	c1.roll=22;
	strcpy(c1.name,"Mandar");
	c1.ptr=NULL;

	c1.ptr=&c1;
	printf("Name: %s\nRoll: %d\n",c1.ptr->name,c1.ptr->roll);

	c2.roll=17;
	strcpy(c2.name,"Patkar");
	c2.ptr=NULL;

	c1.ptr=&c2;
	printf("Name: %s\nRoll: %d\n",c1.ptr->name,c1.ptr->roll);

	return 0;
}
