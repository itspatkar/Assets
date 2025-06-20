// Neosoft : Difference between maximum sum & minimum sum by using M element from array of N integers.

#include<iostream>
using namespace std;

int maxMin(int N, int M, int A[]){
    int temp, minSum=0, maxSum=0, result=0;

    for(int i=0; i<N; i++){
        for(int j=0; j<N; j++){
            if(A[i] < A[j]){
                temp = A[i];
                A[i] = A[j];
                A[j] = temp;
            }
        }
    }
    for(int i=0; i<M; i++){
        minSum = minSum+A[i];
        maxSum = maxSum+A[N-i];
    }
    result = maxSum-minSum;
    
    return result;
}

int main(){
    int N, M;
    cin>>N>>M;
    
    int A[N];
    for (int i=0; i<N; i++)
        cin>>A[i];

    cout<<maxMin(N,M,A);

    return 0;
}
