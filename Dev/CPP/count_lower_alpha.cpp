#include <iostream>
using namespace std;

int main(){
	int count = 0;
	string s = "";
	cout << "Enter String: ";
	cin>>s;

	for(int i=0; i<=s.length(); i++)
		if(s[i] >= 'a' && s[i]<='z')
			count++;

	cout << count << endl;

	return 0;
}