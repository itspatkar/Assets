#include<stdio.h>

struct classroom {
	int roll;
	char name[10];
};

void print(struct Classroom *c_ptr){
	printf("Name: %s\nRoll: %d\n",c_ptr->name,c_ptr->roll);
}

int main(int argc, char const *argv[]){
	struct Classroom c1 = {22, "Mandar"};
	struct Classroom c2 = {17, "Patkar"};

	print(&c1);
	print(&c2);

	return 0;
}
