// Reverse of string is equal to original string itself.

#include<iostream>
using namespace std;

int main(){
	int n=0, i;
	char s[100], rev[100];

	cout<<"Enter String : ";
	cin>>s;

	while(s[n]!='\0')
		n++;

	for(i=0; i<=n-1; i++)
		rev[n-i-1] = s[i];

	for(i=0; i<=n-1; i++)
		if(s[i] != rev[i]) break;

	if(i == n) cout<<"String is palindrome\n";
	else cout<<"String is not palindrome\n";

	return 0;
}
