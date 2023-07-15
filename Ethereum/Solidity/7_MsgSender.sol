//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* > msg.sender:
It is an object that returns the address of the sender of the message or current call who has called, initiated a function,
or created a transaction. This address could be of a contract or even a person/account. */

contract Address {
    address public myAddress;

    function updateAddress() public {
        myAddress = msg.sender;
    }
}
