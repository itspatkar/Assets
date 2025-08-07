//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

contract BlockchainMessenger {
    uint public counter;
    address public owner;
    string public message;

    constructor(){  
        owner = msg.sender;
    }

    function updateString(string memory newMessage) public {
        if(msg.sender == owner){
            message = newMessage;
            counter++;
        }
    }
}
