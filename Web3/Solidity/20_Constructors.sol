//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/* 
> Constructor:
- It is declared as either public or internal

syntax: constructor() {
    // code
}
*/

contract Constructor {
    address public owner;

    constructor(){
        owner = msg.sender;
    }

    function getBalance() public view returns (uint) {
        return owner.balance;
    }
}
