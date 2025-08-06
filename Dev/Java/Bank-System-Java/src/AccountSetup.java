import java.util.Scanner;

public class AccountSetup extends Bank {
    void info() {
        System.out.print("MAccount Name : " + account_name);
        System.out.print("\nAccount Number : " + account_no);
    }

    boolean changePin() {
        int pin;

        System.out.print("Enter Existing Pin : ");
        pin = input.nextInt();

        if (pin == atm_pin) {
            while (true) {
                System.out.print("Enter New Pin : ");
                atm_pin = input.nextInt();
                if (atm_pin >= 1000 && atm_pin <= 9999) {
                    int n = atm_pin;
                    rev_pin = 0;
                    while (n != 0) {
                        rev_pin = rev_pin * 10 + n % 10;
                        n = n / 10;
                    }
                    if (atm_pin == rev_pin) System.out.println("Try another pin...!");
                    else {
                        System.out.print("Pin changed successfully.");
                        break;
                    }
                } else System.out.println("Only 4 digit pin accepted...!");
            }
        } else if (pin == rev_pin) {
            System.out.println("ATM Blocked...!");
            return false;
        } else {
            System.out.print("Incorrect Pin...!");
        }

        return true;
    }

    void changeName() {
        Scanner input = new Scanner(System.in);
        System.out.print("Enter New Name : ");
        account_name = input.nextLine();
        System.out.print("Name changed successfully.");
    }
}
