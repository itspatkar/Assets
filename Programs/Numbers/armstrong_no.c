// Armstrong number of n digits is integer such that sum of nth power of its each digits is equal to the number itself.

#include <stdio.h>
#include <math.h>

int main(){
    int n, d, c = 0, t = 0, k;

    printf("Enter Number : ");
    scanf("%d", &n);
    k = n;
    while (n != 0){
        c++;
        d = n % 10;
        n = n / 10;
    }
    n = k;
    while (n != 0){
        d = n % 10;
        t = t + pow(d, c);
        n = n / 10;
    }
    if (k == t) printf("%d is armstrong\n", k);
    else printf("%d is not armstrong\n", k);
    
    return 0;
}
