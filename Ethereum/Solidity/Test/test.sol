//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

contract SampleContract {
    string public message = "Hello World";

    function updateString(string memory newMessage) public payable {
        if(msg.value == 1 ether){
            message = newMessage;
        } else {
            payable(msg.sender).transfer(msg.value);
        }
    }

    function getValue() public payable returns(uint) {
        return msg.value;
    }
}
