//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

contract Constructors {
    address public myAddress;

    constructor(address inAddress){
        myAddress = inAddress;
    }
}