//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

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