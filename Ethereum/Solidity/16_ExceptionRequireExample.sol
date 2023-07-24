//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* > require() function:
require() function is used for exception handling.
The require function is used to verify inputs and conditions before execution.
If the condition is false, then the require function immediately stops execution.
It does not consume gas. */

contract Exceptions {
    mapping(address => uint) public balanceReceived;

    function receieMoney() public payable {
        balanceReceived[msg.sender] += msg.value;
    }

    function withdrawMoney(address payable toAddr, uint inAmount) public {
        require(inAmount <= balanceReceived[msg.sender], "Not Enough Funds, Aborting...!");
        balanceReceived[msg.sender] -= inAmount;
        toAddr.transfer(inAmount);
    }
}