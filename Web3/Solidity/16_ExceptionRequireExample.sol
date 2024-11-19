//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

contract Exceptions {
    mapping(address => uint) public balanceReceived;

    function receieMoney() public payable {
        balanceReceived[msg.sender] += msg.value;
    }

    function withdrawMoney(address payable toAddr, uint amount) public {
        require(amount <= balanceReceived[msg.sender], "Not Enough Funds");
        balanceReceived[msg.sender] -= amount;
        toAddr.transfer(amount);
    }
}
