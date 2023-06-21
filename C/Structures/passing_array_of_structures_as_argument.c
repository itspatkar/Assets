#include<stdio.h>

struct Classroom {
	int roll;
	char name[10];
};

void print(struct Classroom c[]){
	for (int i = 0; i < 2; i++)
		printf("Name: %s\nRoll: %d\n",c[i].name,c[i].roll);
}

int main(int argc, char const *argv[]){
	struct Classroom c[2] = {{22, "Mandar"},{17, "Patkar"}};

	print(c);

	return 0;
}
