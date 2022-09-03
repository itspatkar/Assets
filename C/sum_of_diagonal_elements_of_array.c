#include<stdio.h>

int main(){
	int a[10][10],i,j,sum=0,m,n;

	printf("Enter row and column of matrix : ");
	scanf("%d %d",&m,&n);

	printf("Enter elements of matrix: ");
	for(i=0;i<m;i++)
		for(j=0;j<n;j++)
			scanf("%d",&a[i][j]);

	printf("Matrix is :\n");
	for(i=0;i<m;i++){
		for(j=0;j<m;j++)
			printf("%d\t",a[i][j]);
		printf("\n");
	}

	for(i=0;i<m;i++)
		for(j=0;j<n;j++)
			if(i==j) sum=sum+a[i][j];

	printf("\nSum of diagonal elements of matrix is = %d\n",sum);

	return 0;
}
