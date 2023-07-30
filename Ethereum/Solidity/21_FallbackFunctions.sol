//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
> Fallback function:
- Fallback function is used for receiving ether from accounts without directly interacting with functions.
- It uses low-level interaction
- Fallback function cannot have arguments, cannot return anything
- Must have external visibility and payable state mutability.

> receive() function:
- This function is called for plain Ether transfers, i.e. for every call with empty calldata.

> fallback() function:
- This function is called for all messages sent to this contract, except plain Ether transfers
(there is no other function except the receive function).
- Any call with non-empty calldata to this contract will execute.
- It is limited to 2300 gas when called by another function. It is so for as to make this function call as cheap as possible. 

> Note:
- receive() function gets priority over fallback() when a calldata is empty.
- But fallback() gets precedence over receive when calldata does not fit a valid function signature.
*/

contract FallBack {
    address owner;
    string public fallbackCalled;

    constructor(){
        owner = msg.sender;
    }
    
    mapping(address => uint) public balanceReceived;

    function getBalance() public view returns(uint) {
        return address(this).balance;
    }

    function ReceiveMoney() public payable {
        balanceReceived[msg.sender] += msg.value;
    }

    function withdrawMoney(address payable to, uint amount) public {
        require(balanceReceived[msg.sender] >= amount);
        balanceReceived[msg.sender] -= amount;
        to.transfer(amount);
    }

    // Fallback function (with empty call data)
    receive() external payable {
        fallbackCalled = "receive";
    }

    // Fallback function (with call data)
    fallback() external payable {
        fallbackCalled = "fallback";
    }
}
