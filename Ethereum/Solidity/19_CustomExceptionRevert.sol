//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
> revert:
- This statement is similar to the require statement.
- It does not evaluate any condition and does not depends on any state or statement.
- It is used to generate exceptions, display errors, and revert the function call.
- This statement contains a string message which indicates the issue related to the information of the exception.
- Calling a revert statement implies an exception is thrown, the unused gas is returned and the state reverts to its original state.
- Revert is used to handle the same exception types as require handles, but with little bit more complex logic. 
- throw is depracated and removed from solidity 0.4.10
*/

contract Exception {
    // Custom Error (Named Exceptions):
    error NotAllowedError(string);

    function raiseError() public pure {
        // Raise error using require:
        require(false, "Error Raised by Require!");

        // Raise panic using assert:
        assert(false);

        // Raise custom error using revert:
        revert NotAllowedError("You are not allowed!");
    }
}

contract ErrorHandler {
    event ErrorLoggerR(string reason); // Require
    event ErrorLoggerA(uint code); // Assert
    event ErrorLogger(bytes lowLevelData); // Custom Exception

    function catchError() public {
        Exception err = new Exception();
        
        try err.raiseError() {
            // Working Code
        } catch Error(string memory reason){
            emit ErrorLoggerR(reason);
        } catch Panic(uint errorCode){
            emit ErrorLoggerA(errorCode);
        } catch (bytes memory lowLevelData){
            emit ErrorLogger(lowLevelData);
        }
    }
}
