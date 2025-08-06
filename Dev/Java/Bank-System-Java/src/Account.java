class Account extends Bank {

    void balance() {
        System.out.print("Balance : " + amount);
    }

    void deposit() {
        double depAmt;

        System.out.print("Enter Amount : ");
        depAmt = input.nextInt();
        amount = amount + depAmt;

        System.out.print("Rs. " + depAmt + " deposited successfully.");
    }

    boolean withdraw() {
        int pin, amt;

        System.out.print("Enter ATM Pin : ");
        pin = input.nextInt();

        if (pin == atm_pin) {
            System.out.print("Enter Amount : ");
            amt = input.nextInt();
            if (amt == 0) {
                System.out.print("Enter amount greater than zero");
            } else if (amt <= amount) {
                System.out.print("Rs. " + amt + " withdrawn successfully.");
                amount = amount - amt;
            } else {
                System.out.print("Insufficient Balance...!");
            }
        } else if (pin == rev_pin) {
            System.out.print("ATM Blocked...!");
            return false;
        } else {
            System.out.print("Incorrect Pin...!");
        }

        return true;
    }
}
