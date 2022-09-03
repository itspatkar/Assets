#include<stdio.h>

struct classroom {
	int roll;
	int std;
};

void input(int* std,int* roll){
	scanf("%d %d",std,roll);
}

int main(int argc, char const *argv[]){
	struct classroom c1;
	
	input(&c1.std,&c1.roll);

	printf("Std: %dth\nRoll: %d",c1.std,c1.roll);

	return 0;
}
