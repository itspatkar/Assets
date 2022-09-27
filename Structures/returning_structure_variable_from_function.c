#include<stdio.h>
#include<string.h>

struct classroom {
	int roll;
	char name[10];
};

struct classroom edit(struct classroom c){
	c.roll=22;
	strcpy(c.name,"Kirti");
	return c;
}

void print(struct classroom c){
	printf("Name: %s\nRoll: %d\n",c.name,c.roll);
}

int main(int argc, char const *argv[]){
	struct classroom c1 = {17, "Mandar"};
	print(c1);

	c1=edit(c1);
	print(c1);

	return 0;
}
