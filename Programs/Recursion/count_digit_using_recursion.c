#include <stdio.h>

int countDigits(int n){
	static int count;
 
	if(n > 0){
		count++;
		countDigits(n/10);
	} else return 0;
	
	return count;
}

int main(){
	int n;

	printf("Enter Positive Number : ");
	scanf("%d",&n);
	printf("Digits %d is : %d\n",n,countDigits(n));

	return 0;
}
