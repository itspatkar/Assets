#include <bits/stdc++.h>
using namespace std;

class Calculator {        
    public:
        float x=0;
        char c;
        bool operation(char);

    // Returns Integer :
    int buildIntNumber(){
        string s;
        int t;
        bool is_float;

        REP:
        is_float = true;
        cin >> s;
        // Check If input is number or not -
        for (int i=0; i<s.length(); i++)
            if (isdigit(s[i]) == false)
                is_float = false;

        // Convert string to number (float) -
        if (is_float){
            string temp_str;
            int temp_float;
            stringstream str_strm;
            str_strm << s;
            while (!str_strm.eof()){
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
    float buildFloatNumber(){
        string s;
        float t;
        bool is_float;

        REP:
        is_float = true;
        cout<< " > ";
        cin >> s;
        // Check If input is number or not -
        for (int i=0; i<s.length(); i++)
            if (isdigit(s[i]) == false)
                is_float = false;

        // Convert string to number (float) -
        if (is_float) {
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

    // Addition :
    void addition(){
        float a;
        a = buildFloatNumber();
        x = x+a;
    }

    // Substraction :
    void substraction(){
        float s;
        s = buildFloatNumber();
        x = x-s;
    }

    // Multiplication :
    void multiplication(){
        float m;
        m = buildFloatNumber();
        x = x*m;
    }

    // Division :
    void division(){
        float d;
        d = buildFloatNumber();
        x = x/d;
    }

    // Modulus Division :
    void modulus(){
        int t, temp;
        temp = x;
        t = buildIntNumber();
        x = temp%t;
    }

    // Power :
    void power(){
        float p;
        p = buildFloatNumber();
        x = pow(x, p);
    }

    // Root :
    void root(){
        float r;
        cout << "To Power : ";
        r = buildFloatNumber();
        x = pow(x, 1/r);
    }

    // Logarithm :
    void logarithm(){
        int l;
        cout << "To Base : ";
        l = buildIntNumber();
        x = log(x)/log(l);
    }

    // Antilogarithm :
    void antilogarithm(){
        int v;
        cout << "To Base : ";
        v = buildIntNumber();
        x = pow(v, x);
    }

    // Factorial :
    void factorial(){
        float f=1;
        for (int i=1; i<=x; i++)
            f = f*i;
        x = f;
    }
};

// Operation Case :
bool Calculator::operation(char c){
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

int main(){
    bool flag;
    Calculator calc;

    // Instruction :
    cout << "Use Symbol:\n Power : ^ \n Root : R \n Factorial : ! \n Logarithm : L \n Antilogarithm : A \n Answer : = \n Exit : CTRL+C \n-------------------\n" << endl;

    calc.x = calc.buildFloatNumber();
    UP:
    cin >> calc.c;
    flag = calc.operation(calc.c);
    if (!flag)
        cout << calc.x;
    goto UP;

    return 0;
}