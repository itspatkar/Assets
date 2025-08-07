#include<stdio.h>
#include<math.h>

float add(float a, float b) {
    return a + b;
}

float sub(float a, float b) {
    return a - b;
}

float mul(float a, float b) {
    return a * b;
}

float div(float a, float b) {
    return a / b;
}

float square(float a) {
    return pow(a, 2);
}

float square_root(float a) {
    return sqrt(a);
}

float cube(float a) {
    return pow(a, 3);
}

float cube_root(float a) {
    return cbrt(a);
}

float factorial(float a) {
    float fact = 1;
    for (int i = 1; i <= a; i++) {
        fact = fact * i;
    }
    return fact;
}

int main() {
    float a, b, ans = 0;
    char choice;

    printf("Operations Available:\n + : Addition \n - : Subtraction\n * : Multiply \n / : Division\n S : Square \n R: Square root \n C : Cube \n Q : Cube root \n ! : Factorial \n X : Exit\n\n");

    printf("Enter Number: ");
    scanf("%f", &a);

    while (1) {
        printf("Enter Operator: ");
        scanf(" %c", &choice);

        if (choice == 'X') {
            printf("Exiting Calculator...\n");
            break;
        }

        switch (choice) {
        case '+':
            printf("Enter Number: ");
            scanf("%f", & b);
            ans = add(a, b);
            break;
        case '-':
            printf("Enter Number: ");
            scanf("%f", & b);
            ans = sub(a, b);
            break;
        case '*':
            printf("Enter Number: ");
            scanf("%f", & b);
            ans = mul(a, b);
            break;
        case '/':
            printf("Enter Number: ");
            scanf("%f", & b);
            ans = div(a, b);
            break;
        case 'S':
            ans = square(a);
            break;
        case 'R':
            ans = square_root(a);
            break;
        case 'C':
            ans = cube(a);
            break;
        case 'Q':
            ans = cube_root(a);
            break;
        case '!':
            ans = factorial(a);
            break;
        default:
            printf("Enter Valid Operation!\n");
            continue;
        }
        printf("Answer: %f\n", ans);
        a = ans;
    }
}