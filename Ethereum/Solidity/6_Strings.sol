//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* In solidity, string are stored in memory not as storage variables.
We cant concatenate string, search or replace string.
It is also expensive in terms of gas price.

We can store it as events or outside of blockchain and only its hash on blockchain. */

contract Strings {
    // Strings:
    string public myString = "Hello World";

    // Bytes:
    bytes public myBytes = "Hello Bytes";

    function setString(string memory inString) public {
        myString = inString;
    }

    function compareString(string memory inString) public view returns(bool) {
        return keccak256(abi.encodePacked(myString)) == keccak256(abi.encodePacked(inString));
    }

    function getBytesLength() public view returns(uint) {
        return myBytes.length;
    }
}