//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* Modifiers:
Function behavior can be changed using special function called modifiers.
Function modifier can be used to automatically check the condition prior to executing the function.
Function modifier can be executed before or after the function executes its code.
If the given condition is not satisfied, then the function will not get executed.
Function modifier can have arguments.

> Merge Wildcard :
The _; symbol is known as Merge Wildcard and this is replaced by the function definition during execution.
In other words, after this wildcard has been used, the control is moved to the location where the appropriate function definition is located. 
This symbol is mandatory for all modifiers.
The modifier may contain this wildcard anywhere. */

contract Token {
    address owner;
    uint tokenPrice = 1 ether;
    mapping(address => uint) public tokenBalance;

    constructor() {
        owner = msg.sender;
        tokenBalance[owner] = 100;
    }

    // Modifier:
    modifier onlyOwner() {
        require(msg.sender == owner, "You are not allowed");
        _;
    }

    function createNewToken() public onlyOwner {
        tokenBalance[owner]++;
    }
    function burnToken() public onlyOwner {
        tokenBalance[owner]--;
    }
    function purchaseToken() public payable {
        require((tokenBalance[owner] * tokenPrice) / msg.value > 0, "not enough tokens");
        tokenBalance[owner] -= msg.value / tokenPrice;
        tokenBalance[msg.sender] += msg.value / tokenPrice;
    }
    function sendToken(address _to, uint _amount) public {
        require(tokenBalance[msg.sender] >= _amount, "Not enough tokens");
        tokenBalance[msg.sender] -= _amount;
        tokenBalance[_to] += _amount;
    }

}