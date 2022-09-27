#include<stdio.h>

struct classroom {
	int roll;
	char name[10];
};

void print(struct classroom c[]){
	for (int i = 0; i < 2; i++)
		printf("Name: %s\nRoll: %d\n",c[i].name,c[i].roll);
}

int main(int argc, char const *argv[]){
	struct classroom c[2] = {{17, "Mandar"},{22, "Kirti"}};

	print(c);

	return 0;
}
