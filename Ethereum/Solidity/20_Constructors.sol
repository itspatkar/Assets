//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* Constructor :
syntax: constructor() {
    // code
}

- It is either public or internal
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
