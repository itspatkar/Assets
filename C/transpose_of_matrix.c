#include<stdio.h>

int main(){
	int m,n,i,j,a[10][10],t[10][10];

	printf("Enter no of rows and columns : ");
	scanf("%d %d",&m,&n);
	printf("Enter Matrix :\n");
	for(i=0;i<m;i++)
		for(j=0;j<n;j++)
			scanf("%d",&a[i][j]);

	printf("Matrix is :\n");
	for(i=0;i<m;i++){
		for(j=0;j<n;j++)
			printf("%d\t",a[i][j]);
		printf("\n");
	}

	for(i=0;i<m;i++)
		for(j=0;j<n;j++)
			t[j][i]=a[i][j];

	printf("\nTranspose of matrix is :\n");
	for(i=0;i<m;i++){
		for(j=0;j<n;j++)
			printf("%d \t",t[i][j]);
		printf("\n");
	}

	return 0;
}
