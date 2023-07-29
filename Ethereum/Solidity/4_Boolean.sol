//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

// Boolean operators: or, and, ||, &&

contract Boolean {
    bool public myBool;
    bool public myInvBool;

    function setMyBool(bool val) public {
        myBool = val;
    }

    function setMyFlag(bool val) public {
        myInvBool = !val;
    }
}
