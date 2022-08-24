//  CLI Caclulator using C++

#include <iostream>
#include <math.h>
#include <cmath>
#include <sstream>
using namespace std;

float x = 0;
char c;

class Calculator {
    public:
        int buildIntNumber();
        float buildFloatNumber();
        bool operation(char);

    // Addition :
    void addition() {
        float a;
        a = buildFloatNumber();
        x = x + a;
    }

    // Substraction :
    void substraction() {
        float s;
        s = buildFloatNumber();
        x = x - s;
    }

    // Multiplication :
    void multiplication() {
        float m;
        m = buildFloatNumber();
        x = x * m;
    }

    // Division :
    void division() {
        float d;
        d = buildFloatNumber();
        x = x / d;
    }

    // Modulus Division :
    void modulus() {
        int t, temp;
        temp = x;
        t = buildIntNumber();
        x = temp % t;
    }

    // Power :
    void power() {
        float p;
        p = buildFloatNumber();
        x = pow(x, p);
    }

    // Root :
    void root() {
        float r;
        cout << "To Power : ";
        r = buildFloatNumber();;
        x = pow(x, 1 / r);
    }

    // Logarithm :
    void logarithm() {
        int l;
        cout << "To Base : ";
        l = buildIntNumber();
        x = log(x) / log(l);
    }

    // Antilogarithm :
    void antilogarithm() {
        int v;
        cout << "To Base : ";
        v = buildIntNumber();
        x = pow(v, x);
    }

    // Factorial :
    void factorial() {
        float f = 1;
        for (int i = 1; i <= x; i++)
            f = f * i;
        x = f;
    }
};

// Operation Case :
bool Calculator::operation(char c) {
    switch (c) {
    case '+':
        addition();
        break;
    case '-':
        substraction();
        break;
    case '*':
        multiplication();
        break;
    case '/':
        division();
        break;
    case '%':
        modulus();
        break;
    case '^':
        power();
        break;
    case 'R':
        root();
        break;
    case '!':
        factorial();
        break;
    case 'L':
        logarithm();
        break;
    case 'A':
        antilogarithm();
        break;
    case '=':
        cout << " " << x;
        return true;
    default:
        cout << "Invalid Input\n";
        return true;
    }
    return false;
}

// Returns Integer :
int Calculator::buildIntNumber() {
    string s;
    int t;
    bool isFloat;

    REP:
        isFloat = true;
    cin >> s;
    // Check If input is number or not -
    for (int i = 0; i < s.length(); i++)
        if (isdigit(s[i]) == false)
            isFloat = false;

    // Convert string to number (float) -
    if (isFloat == true) {
        string temp_str;
        int temp_float;
        stringstream str_strm;
        str_strm << s;
        while (!str_strm.eof()) {
            str_strm >> temp_str;
            istringstream(temp_str) >> temp_float;
            temp_str = "";
        }
        t = temp_float;
    } else {
        cout << "Enter Number Only!" << endl;
        goto REP;
    }

    return t;
}

// Returns Float :
float Calculator::buildFloatNumber() {
    string s;
    float t;
    bool isFloat;

    REP:
        isFloat = true;
    cin >> s;
    // Check If input is number or not -
    for (int i = 0; i < s.length(); i++)
        if (isdigit(s[i]) == false)
            isFloat = false;

    // Convert string to number (float) -
    if (isFloat == true) {
        string temp_str;
        float temp_float;
        stringstream str_strm;
        str_strm << s;
        while (!str_strm.eof()) {
            str_strm >> temp_str;
            istringstream(temp_str) >> temp_float;
            temp_str = "";
        }
        t = temp_float;
    } else {
        cout << "Enter Number Only!" << endl;
        goto REP;
    }

    return t;
}

// Main Function :
int main() {
    bool flag;
    Calculator ob;

    // Note :
    cout << "\tUse Symbol :\n Power : ^ \n Root : R \n Factorial : ! \n Logarithm : L \n Antilogarithm : A \n Answer : = \n Exit : CTRL + C \n ----------------\n\n" <<
        endl;

    x = ob.buildFloatNumber();
    UP:
        cin >> c;
    flag = ob.operation(c);
    if (flag == false)
        cout << x;
    goto UP;

    return 0;
}
