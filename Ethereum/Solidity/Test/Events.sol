//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* Events:
There is a special data-structure in Ethereum to provide the outside world with better access to return values.
These logs are stored on blockchain and are accessible using address of the contract till the contract is present on the blockchain.
An event is emitted, it stores the arguments passed in transaction logs.
An event generated is not accessible from within contracts, not even the one which have created and emitted them.
That is the logging facility of Ethereum. Events are a way to access this logging facility.
Functions can't return data externally, use event instead.

- Events are used for return values, data store and trigger.
- Events are cannot be retrived from within smart contracts.
- Events arguments marked as indexed can be search for.
- Events are cheap. */

contract MyEvent {
    mapping(address => uint) public tokenBalance;

    event TokenSent(address fromAddr, address toAddr, uint inAmount);

    constructor(){
        tokenBalance[msg.sender] = 100;
    }

    function sendToken(address toAddr, uint inAmount) public returns(bool) {
        require(tokenBalance[msg.sender] >= inAmount, "Not Enough Funds...!");
        tokenBalance[msg.sender] -= inAmount;
        tokenBalance[toAddr] += inAmount;

        emit TokenSent(msg.sender, toAddr, inAmount);
        
        return true;
    }
}