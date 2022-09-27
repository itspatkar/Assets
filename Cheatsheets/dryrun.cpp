#include <iostream>
using namespace std;


int sumOfNum(int num[], int size){
	int sum=0;
	for (int i = 0; i < size; i++){
		sum += num[i];
	}
	return sum;
}

int main(){
	int num[5] = { 1, 2, 3, 4, 5};
	int size = sizeof(num) / sizeof(int);
	cout << "Sum of numbers is " << sumOfNum(num,size);

	return 0;
}
