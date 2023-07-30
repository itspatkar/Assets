//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
> ABI Array:
- ABI stands for Application Binary Interface.
- The ABI Array contains all functions, inputs and outputs, returns values, as well as all variables and their types from a smart contract.
- When compiling a smart contract then bytecode is generated which gets deployed on the blockchain.
- Inside there are assembly opcodes telling the EVM during execution of a smart contract where to jump to.
- Those jump destinations are the first 4 bytes of the keccak hash of the function signature. 
- contains all the information to interact with the contract.
- It is JSON file.
*/

contract MyContract {
    uint public myUint = 123;

    function setMyUint(uint inUint) public {
        myUint = inUint;
    }
}
