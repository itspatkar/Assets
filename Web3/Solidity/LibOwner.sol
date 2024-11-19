//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

contract Owned {
    address owner;

    constructor(){
        owner = msg.sender;
    }

    function isAdmin(address addrs) public view returns (bool) {
        if (addrs == owner) return true;
        return false;
    }
}
