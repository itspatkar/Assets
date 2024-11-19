#include<stdio.h>

struct Classroom {
	int roll;
	char name[10];
};

void print(struct classroom c){
	printf("Name: %s\nRoll: %d\n",c.name,c.roll);
}

int main(int argc, char const *argv[]){
	struct Classroom c1 = {22, "Mandar"};
	struct Classroom c2 = {17, "Patkar"};

	print(c1);
	print(c2);

	return 0;
}
