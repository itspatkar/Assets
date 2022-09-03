// Binary Search Algorithm in C++ : Array should be sorted to implement binary search

#include<iostream>
using namespace std;

bool Binary(int n){
	int beg, mid, end, i, j, a[100];

	for (int i = 0; i < 100; i++)
		a[i] = i + 1;
	beg = 0;
	end = 100;
	while (beg <= end){
		mid = (beg + end) / 2;
		if (n == a[mid]){
			cout << "\nNo is found at location (index) = " << mid<<"\nviz a["<<mid<<"]="<<n<<endl;
			return true;
		}
		else {
			if (n > a[mid])
				beg = mid + 1;
			else
				end = mid - 1;
		}
	}

	return false;
}

int main()
{
	int n;
	bool b;

	cout << "Enter No between 1-100 : ";
	cin >> n;
	b = Binary(n);
	if (b != true)
		cout << "\nNumber Not Found !\n";

	return 0;
}
