//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

contract Mapping {
    mapping(address => uint) public balanceReceived;

    function getBalance() public view returns(uint) {
        return address(this).balance;
    }

    function receiveMoney() public payable {
        balanceReceived[msg.sender] += msg.value;
    }

    function withdrawMoney(address payable to, uint amount) public {
        require(balanceReceived[msg.sender] >= amount);
        balanceReceived[msg.sender] -= amount;
        to.transfer(amount);
    }

    function withdrawAllMoney(address payable to) public {
        uint balanceToSend = balanceReceived[msg.sender];
        balanceReceived[msg.sender] = 0;
        to.transfer(balanceToSend);
    }
}
