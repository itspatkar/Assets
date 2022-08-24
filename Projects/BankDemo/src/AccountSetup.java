import java.util.Scanner;

public class AccountSetup extends Bank {
    void info() {
        System.out.println("Account Name : " + accountName);
        System.out.println("Account NO : " + accountNo);
    }

    boolean changePin() {
        int pin;

        System.out.print("\nEnter Existing Pin : ");
        pin = input.nextInt();

        if (pin == atmPin) {

            while (true) {
                System.out.print("Enter New Pin : ");
                atmPin = input.nextInt();
                if (atmPin >= 1000 && atmPin <= 9999) {

                    int n = atmPin, d;
                    revPin = 0;
                    while (n != 0) {
                        d = n % 10;
                        revPin = revPin * 10 + d;
                        n = n / 10;
                    }
                    if (atmPin == revPin) System.out.println("Try another pin!");
                    else {
                        System.out.println("Pin changed successfully");
                        break;
                    }
                } else System.out.println("Only 4 digit pin accepted!");
            }

        } else if (pin == revPin) {
            System.out.println("ATM Blocked");
            return false;
        } else {
            System.out.print("\nIncorrect Pin!");
        }

        return true;
    }

    void changeName() {
        Scanner input = new Scanner(System.in);

        System.out.print("Enter New Name : ");
        accountName = input.nextLine();
        System.out.print("Name changed successfully.");

    }
}
