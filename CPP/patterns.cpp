// Seven different types of patterns using C++

#include <iostream>
using namespace std;

class loop{
  private:
	int i, j;

  public:
	void loop1(int n){
		cout << "\tFirst\n";
		for (i = 0; i <= n; i++){
			for (j = 1; j <= n - i; j++)
				cout << " * ";
			cout << "\n";
		}
	}
	void loop2(int n){
		cout << "\tSecond\n";
		for (i = 0; i <= n; i++){
			for (j = 1; j <= n - i; j++)
				cout << "   ";
			for (j = 1; j <= i; j++)
				cout << " * ";
			cout << "\n";
		}
	}
	void loop3(int n){
		cout << "\tThird\n";
		for (i = 0; i <= n; i++){
			for (j = 1; j <= i; j++)
				cout << " * ";
			cout << "\n";
		}
	}
	void loop4(int n){
		cout << "\tFourth\n";
		int c;
		for (i = 1; i <= n; i++){
			c = 0;
			for (j = 1; j <= i; j++)
				cout << ++c;
			cout << "\n";
		}
	}
	void loop5(int n){
		cout << "\tFifth\n";
		for (i = 1; i <= n; i++){
			for (j = 1; j <= i; j++)
				cout << char (j + 64);
			cout << "\n";
		}
	}
	void loop6(int n){
		cout << "\tSixth\n";
		for (i = 1; i <= n; i++){
			for (j = 1; j <= i; j++)
				cout << char (i + 64);
			cout << "\n";
		}
	}
	void loop7(int n){
		cout<<"\tSeventh\n";
		int k,space;
		for(i=1,k=0;i<=n;++i,k=0){
			for(space=1;space<=n-i;++space)
				cout <<"  ";
			while(k!=2*i-1){
				cout << "* ";
				++k;
			}
			cout << endl;
		}    
	}
};

int main(){
	int n;

	cout << "Enter Number : ";
	cin >> n;
	loop ob;
	ob.loop1(n);
	ob.loop2(n);
	ob.loop3(n);
	ob.loop4(n);
	ob.loop5(n);
	ob.loop6(n);
	ob.loop7(n);
	
	return 0;
}
