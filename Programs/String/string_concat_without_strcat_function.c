#include <stdio.h>

int main(){
	char s1[100], s2[100], i=0, j;

	printf("Enter first string : ");
	scanf("%s", s1);
	printf("Enter second string : ");
	scanf("%s", s2);
	// calculate length of string s1 -
	while(s1[i]!= '\0') i++;
	
	for(j = 0; s2[j] != '\0'; ++j, ++i)
		s1[i] = s2[j];
	s1[i] = '\0';
	printf("After concatenation : %s\n", s1);

	return 0;
}
