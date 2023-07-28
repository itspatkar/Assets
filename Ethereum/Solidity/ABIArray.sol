//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* ABI Array:
ABI stands for Application Binary Interface.
The ABI Array contains all functions, inputs and outputs, as well as all variables and their types from a smart contract.
When you compile a smart contract then you get bytecode which gets deployed.
Inside there are assembly opcodes telling the EVM during execution of a smart contract where to jump to.
Those jump destinations are the first 4 bytes of the keccak hash of the function signature. */

contract MyContract {
    uint public myUint = 123;

    function setMyUint(uint inUint) public {
        myUint = inUint;
    }
}