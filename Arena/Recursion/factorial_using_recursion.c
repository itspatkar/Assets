#include<stdio.h>

int factorial(int i){
   if(i == 1) return 1;
   else return i * factorial(i - 1);
}

int main() {
   int n;

   printf("Enter Number : ");
   scanf("%d",&n);
   printf("Factorial of %d = %d\n", n, factorial(n));
   
   return 0;
}
