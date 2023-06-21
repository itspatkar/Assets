//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

contract Integer {
    // Unsigned Integer:
    uint public valueU;
    uint8 public value8; // 0 - (2^8)-1
    uint256 public value256; // 0 - (2^256)-1

    // Signed Integer:
    int public valueS; // -2^128 - 2^128-1

    function setValueU(uint inValue) public {
        valueU = inValue;
    }

    function setValueS(int inValue) public {
        valueS = inValue;
    }

    function incrementU() public {
        valueU++;
    }
}