//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* Boolean operators: or, and, ||, &&
*/

contract Boolean {
    bool public myBool;
    bool public myFlag;

    function setMyBool(bool inBool) public {
        myBool = inBool;
    }

    function setMyFlag(bool inFlag) public {
        myFlag = !inFlag;
    }
}