//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

contract WillThrow {
    function func() public pure {
        require(false,"Error!");
    }
}

contract ErrorHandler {
    event ErrorLogger(string reason);

    function catchError() public {
        WillThrow will = new WillThrow();
        try will.func() {
            // Code if works (no error)
        } catch Error(string memory reason) {
            emit ErrorLogger(reason);
        }
    }
}
