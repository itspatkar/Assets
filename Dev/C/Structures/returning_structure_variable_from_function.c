#include<stdio.h>
#include<string.h>

struct Classroom {
	int roll;
	char name[10];
};

struct Classroom edit(struct Classroom c){
	c.roll=22;
	strcpy(c.name,"Kirti");
	return c;
}

void print(struct Classroom c){
	printf("Name: %s\nRoll: %d\n",c.name,c.roll);
}

int main(int argc, char const *argv[]){
	struct Classroom c1 = {17, "Mandar"};
	print(c1);

	c1=edit(c1);
	print(c1);

	return 0;
}
