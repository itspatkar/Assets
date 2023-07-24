//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

contract Wallet {
    struct PayamentReceived {
        address from;
        uint amount;
    }

    PayamentReceived public payment;

    function payContract() public payable {
        payment = PayamentReceived(msg.sender, msg.value);
        /* Alternate:
        payment.from = msg.sender;
        payment.amount = msg.value; */
    }
}