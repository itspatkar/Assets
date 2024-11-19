#include<stdio.h>
#include<string.h>

struct Classroom {
	int roll;
	char name[10];
};

void print(int roll,char name[10]){
	printf("Name: %s\nRoll: %d",name,roll);
}

int main(int argc, char const *argv[]){
	struct Classroom c1;
	c1.roll=17;
	strcpy(c1.name,"Mandar");

	print(c1.roll, c1.name);

	return 0;
}
