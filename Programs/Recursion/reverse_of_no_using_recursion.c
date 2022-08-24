#include<stdio.h>

int rev(int n){
	static int sum,r;

	if(n>0){
		r=n%10;
		sum=sum*10+r;
		rev(n/10);
	} else return 0;

	return sum;
}

int main(){
	int n;

	printf("Enter Number : ");
	scanf("%d",&n);
	printf("Reverse : %d",rev(n));
	return 0;
}
