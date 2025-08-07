//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

contract WrapAround {
    uint public myUint;

    function decrementUnchecked() public {
        unchecked {
            myUint--;
        }
    }

    function decrement() public {
        myUint--;
    }
}
