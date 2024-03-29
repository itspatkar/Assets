//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
> require() function:
- require() function is used for exception handling.
- The require function is used to validate inputs and conditions before execution.
- If the condition is false, then the require function immediately stops execution.
- Require can return error string.
- It does not consume gas, it return gas when fail.
*/

contract Exception {
    address owner;

    constructor() {
        owner = msg.sender;
    }

    function receiveMoney() public payable {
    }

    function withdrawMoneyAll(address payable to) public {
        require(msg.sender == owner, "You're not the owner!");
        to.transfer(address(this).balance);
    }
}
