//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
> Strings:
- In solidity, string are stored in memory not as storage variables.
- We cant concatenate, search or replace strings.
- It is also expensive in terms of gas price.
- We can store it as events or outside of blockchain and only its hash on blockchain.
*/

contract Strings {
    // Strings:
    string public myString = "Hello World";

    // Bytes:
    bytes public myBytes = "Hello Bytes";

    function setString(string memory str) public {
        myString = str;
    }

    function compareString(string memory str) public view returns(bool) {
        return keccak256(abi.encodePacked(myString)) == keccak256(abi.encodePacked(str));
    }

    // Bytes has length property:
    function getBytesLength() public view returns(uint) {
        return myBytes.length;
    }
}
