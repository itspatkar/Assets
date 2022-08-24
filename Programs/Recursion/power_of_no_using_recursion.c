#include <stdio.h>

int getPower(int b,int p){
	if(p==0) return 1;
	else return b*(getPower(b,p-1));
}

int main(){
	int base, power;

	printf("Enter Base : ");
	scanf("%d",&base);
	printf("Enter Power : ");
	scanf("%d",&power);
	printf("%d to power %d is = %d\n",base,power,getPower(base,power));

	return 0;
}
