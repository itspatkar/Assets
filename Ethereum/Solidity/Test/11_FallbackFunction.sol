//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* > receive() function:
This function is called for plain Ether transfers, i.e. for every call with empty calldata.
this function cannot have arguments, cannot return anything and must have external visibility and payable state mutability.

> fallback() function:
This function is called for all messages sent to this contract, except plain Ether transfers
(there is no other function except the receive function). Any call with non-empty calldata to this contract will execute.
It is limited to 2300 gas when called by another function. It is so for as to make this function call as cheap as possible. 

receive() is a function that gets priority over fallback() when a calldata is empty.
But fallback gets precedence over receive when calldata does not fit a valid function signature. */

contract Fallback {
    uint public lastValueSent;
    string public lastFunctionCalled;

    // receive() function:
    receive() external payable {
        lastValueSent = msg.value;
        lastFunctionCalled = "receive";
    }

    // fallback() function:
    fallback() external payable {
        lastValueSent = msg.value;
        lastFunctionCalled = "fallback";
    }
}