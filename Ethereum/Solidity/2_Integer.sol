//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
- In solidity all variables are initialized with default values.
- There is no null or undefined.

> Default values:
int = 0
bool = false
string = ""
*/

contract Integer {
    // Unsigned Integer:
    uint public valueU; // 0 to (2^256)-1
    uint256 public valueU256; // 0 to (2^256)-1
    uint8 public valueU8; // 0 to (2^8)-1 (255)
    
    // Signed Integer:
    int public valueI; // -2^128 - 2^128-1
    int8 public valueI8; // -128 to 127

    function setValueU(uint val) public {
        valueU = val;
    }

    function setValueI(int val) public {
        valueI = val;
    }

    function incrementU() public {
        valueU++;
    }
}
