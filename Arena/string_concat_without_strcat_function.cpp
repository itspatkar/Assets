#include<iostream>
using namespace std;

int main(){
	char s1[100], s2[100], i=0, j;

	cout<<"First string : ";
	cin>>s1;
	cout<<"Second string : ";
	cin>>s2;
	
	// Length of string s1 :
	while(s1[i]!= '\0') i++;
	
	for(j = 0; s2[j] != '\0'; ++j, ++i)
		s1[i] = s2[j];
	s1[i] = '\0';

	cout<<"After concatenation : "<<s1<<endl;

	return 0;
}
