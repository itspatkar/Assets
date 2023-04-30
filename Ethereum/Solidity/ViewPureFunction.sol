//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* > View function:
The view functions reads from the state but does not modify (write) the state.
It does not alter the storage variables. Getter method are by default view functions.

> Pure function:
The pure functions do not read or modify the state variables.
It returns the values only using the parameters passed to the function or local variables present in it.
If the statements which read the state variables, access the address or balance, access any global variable block or msg,call a function
that is not pure, etc are present in pure functions then the compiler throws a warning in such cases.
It can only access its own arguments and other pure functions. */

contract ViewPureFunction {
    uint public myStorageVar;

    // Normal Function: read & write storage variables
    function setStorageVar(uint inVar) public returns(uint) {
        myStorageVar = inVar;
        return inVar;
    }

    // View function: read storage variables
    function getStorageVar() public view returns(uint) {
        return myStorageVar;
    }

    // Pure function: neither read & nor write storage variables
    function getAddition(uint a, uint b) public pure returns(uint) {
        return a+b;
    }
}