import java.util.Random;
import java.util.Scanner;

public class Bank {
    static int accountNo, atmPin, revPin;
    static double amount;
    static String accountName;

    Scanner input = new Scanner(System.in);

    void account() {
        System.out.print("Account Creation Wizard \n Enter Name : ");
        accountName = input.nextLine();

        // Account No -
        Random no = new Random();

        int low = 100000;
        int high = 999999;

        accountNo = no.nextInt(high - low) + low;

        // Account Pin -
        low = 1000;
        high = 9999;

        while (true) {
            atmPin = no.nextInt(high - low) + low;

            int n = atmPin, d;
            revPin = 0;
            while (n != 0) {
                d = n % 10;
                revPin = revPin * 10 + d;
                n = n / 10;
            }

            if (atmPin != revPin) break;
        }

        System.out.print("\nAccount Number : " + accountNo);
        System.out.print("\nATM Pin : " + atmPin);
    }

    public static void main(String[] args) {
        char ch;
        boolean flag = true;

        Bank ob = new Bank();
        ob.account();
        Account obA = new Account();
        AccountSetup obS = new AccountSetup();

        while (true) {
            System.out.print(
                    "\n\n---------------\n\n> Services -\nAccount Details (a)\nWithdraw (w)\nDeposit (d)\nBalance (b)\nChange Pin (p)\nChange Name (n)\n -> ");
            ch = ob.input.next().charAt(0);
            switch (ch) {
                case 'a':
                    obS.info();
                    break;
                case 'd':
                    obA.deposit();
                    break;
                case 'b':
                    obA.balance();
                    break;
                case 'w':
                    if (!obA.withdraw()) flag = false;
                    break;
                case 'n':
                    obS.changeName();
                    break;
                case 'p':
                    if (!obS.changePin()) flag = false;
                    break;
                default:
                    System.out.print("Service Not Available!");
                    ob.input.close();
                    flag = false;
                    break;
            }

            if (!flag) break;
        }
    }
}
