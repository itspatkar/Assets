#include<stdio.h>
#include<string.h>

struct Classroom {
	int roll;
	char name[10];
};

int main(int argc, char const *argv[]){
	struct Classroom c1;
	c1.roll=17;
	strcpy(c1.name,"Mandar");

	printf("Name: %s\nRoll: %d",c1.name,c1.roll);

	return 0;
}
