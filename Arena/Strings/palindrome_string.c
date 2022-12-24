#include<stdio.h>

int main(){
	int n=0,i;
	char a[100],rev[100];

	printf("Enter String : ");
	scanf("%s",&a);
	while(a[n]!='\0')
		n++;
	for(i=0;i<=n-1;i++)
		rev[n-i-1]=a[i];
	for(i=0;i<=n-1;i++)
		if(a[i] != rev[i]) break;
	if(i==n) printf("String is Palindrome\n");
	else printf("String is not palindrome\n");

	return 0;
}
