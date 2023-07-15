//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* > payable modifier:
functions and addresses declared payable can receive ether into the contract.
Any address or function that receives ether must be declared as payable.

> msg.value:
The msg.value is global variable or property that returns the amount of Wei (Wei is a denomination of ETH)
that was sent with the message to the transaction or contract.
Function must be payable to access msg.value property.
*/

contract SampleContract {
    // This function receives ether:
    function getValue() public payable returns(uint) {
        return msg.value;
    }
}
