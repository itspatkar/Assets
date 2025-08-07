//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
> Mapping:
- Mappings are like associated arrays or hashmaps.
- All possible keys in mapping are initialized by default.
- It is preferred over arrays beacause of low gas.
- Syntax: Mapping(key => value) map_name
- map_name[key] = value
*/

contract Mapping {
    // Map unsigned integer to boolean
    mapping(uint => bool) public myMapInt;

    // Map address to boolean
    mapping(address => bool) public myMapAdd;

    function setMapInt(uint index) public {
        myMapInt[index] = true;
    }

    function setMapAddTrue() public {
        myMapAdd[msg.sender] = true;
    }

    function setMapAddFalse() public {
        myMapAdd[msg.sender] = false;
    }
}
