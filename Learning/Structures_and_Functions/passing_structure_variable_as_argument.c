#include<stdio.h>

struct classroom {
	int roll;
	char name[10];
};

void print(struct classroom c){
	printf("Name: %s\nRoll: %d\n",c.name,c.roll);
}

int main(int argc, char const *argv[]){
	struct classroom c1 = {17, "Mandar"};
	struct classroom c2 = {22, "Kirti"};

	print(c1);
	print(c2);

	return 0;
}
