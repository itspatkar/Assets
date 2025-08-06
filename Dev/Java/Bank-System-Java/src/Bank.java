import java.util.Random;
import java.util.Scanner;

public class Bank {
    static int account_no, atm_pin, rev_pin;
    static double amount;
    static String account_name;

    Scanner input = new Scanner(System.in);

    void account() {
        System.out.print("Account Creation Wizard");
        System.out.print("\nEnter Name : ");
        account_name = input.nextLine();

        // Account NO:
        Random no = new Random();
        int low = 100000;
        int high = 999999;
        account_no = no.nextInt(high - low) + low;

        // Account Pin:
        low = 1000;
        high = 9999;
        while (true) {
            atm_pin = no.nextInt(high - low) + low;
            int n = atm_pin;
            rev_pin = 0;
            while (n != 0) {
                rev_pin = rev_pin * 10 + n % 10;
                n = n / 10;
            }
            if (atm_pin != rev_pin) break;
        }

        System.out.print("\nAccount Number : " + account_no);
        System.out.print("\nATM Pin : " + atm_pin);
    }

    public static void main(String[] args) {
        char ch;
        boolean flag = true;

        Bank ob = new Bank();
        ob.account();
        Account obA = new Account();
        AccountSetup obS = new AccountSetup();

        System.out.print("\n\n> Services :\nHelp (h)\nAccount Details (a)\nWithdraw (w)\nDeposit (d)\nBalance (b)\nChange Pin (p)\nChange Name (n)");

        while (true) {
            System.out.print("\n\n -> ");
            ch = ob.input.next().charAt(0);
            switch (ch) {
                case 'h':
                    System.out.print("\n\n> Services :\nHelp (h)\nAccount Details (a)\nWithdraw (w)\nDeposit (d)\nBalance (b)\nChange Pin (p)\nChange Name (n)");
                    break;
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
                    System.out.print("Service Not Available..!");
                    ob.input.close();
                    flag = false;
                    break;
            }

            if (!flag) break;
        }
    }
}
