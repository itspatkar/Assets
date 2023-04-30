// Neosoft : Magic Number is absolute difference between sum of odd index elements and even index elements of matrix.

#include <iostream>
using namespace std;

int A[50][50];

int magicNumber(int N, int M){
	int S1=0, S2=0, answer;

	for(int i=0; i<N; i++){
		for(int j=0; j<M; j++){
			if(j%2 == 0)
				S2=S2+A[i][j];
			else
				S1=S1+A[i][j];
		}
	}
	answer = abs(S1-S2);

	return answer;
}

int main(){
	int N, M; // rows & columns
	cin>>N>>M;

	for (int i=0; i<N; i++)
		for (int j=0; j<M; j++)
			cin>>A[i][j];

	cout<<magicNumber(N,M);

	return 0;
}
