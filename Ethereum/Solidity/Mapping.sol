//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

contract Mapping {
    mapping(uint => bool) public myMap;
    mapping(address => bool) public myAddressMap;
    mapping(uint => mapping(uint => bool)) public  uintUintBoolMap;

    function setMyMap(uint index) public {
        myMap[index] = true;
    }
    function getMyMap(uint key) public view returns(bool) {
        return myMap[key];
    }

    function setAddressMapTrue() public {
        myAddressMap[msg.sender] = true;
    }
    function setAddressMapFalse() public {
        myAddressMap[msg.sender] = false;
    }

    function setUintUintBoolMap(uint key1, uint key2, bool value) public {
        uintUintBoolMap[key1][key2] = value;
    }
    function getUintUintBoolMap(uint key1, uint key2) public view returns (bool) {
        return uintUintBoolMap[key1][key2];
    }
}