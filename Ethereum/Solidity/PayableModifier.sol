//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* > msg.value:
The msg.value is global variable or property that returns the amount of Wei (Wei is a denomination of ETH)
that was sent with the message to the transaction or contract.
Function must be payable to access msg.value property.

> payable modifier:
functions and addresses declared payable can receive ether into the contract.
Any address or function that sends or receive ether must be declared as payable.

> transfer() function:
transfer function sends the specedified ether to the address mentioned.
The receiving smart contract should have fallback function define or else the transfer call will throw an error.
There is a gas limit of 2300 gas.
If the transfer fails, it will throw an error. */

contract SampleContract {
    string public message = "Hello World";

    function updateString(string memory newMessage) public payable {
        if(msg.value == 1 ether){
            message = newMessage;
        } else {
            payable(msg.sender).transfer(msg.value);
        }
    }

    function getValue() public payable returns(uint) {
        return msg.value;
    }
}