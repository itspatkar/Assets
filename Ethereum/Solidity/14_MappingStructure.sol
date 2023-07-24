//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

contract MappingStructure {
    struct Payment {
        uint amount;
        uint timestamps;
    }

    struct Balance {
        uint totalBalance;
        uint numPayments;
        mapping (uint => Payment) payments;
    }

    mapping(address => Balance) public balanceReceived;

    function getBalance() public view returns(uint) {
        return address(this).balance;
    }

    function sendMoney() public payable {
        balanceReceived[msg.sender].totalBalance += msg.value;

        Payment memory payment = Payment(msg.value,block.timestamp);

        balanceReceived[msg.sender].payments[balanceReceived[msg.sender].numPayments] = payment;
        balanceReceived[msg.sender].numPayments++;
    }

    function withdrawMoney(address payable to, uint amount) public {
        require(balanceReceived[msg.sender].totalBalance >= amount);
        balanceReceived[msg.sender].totalBalance -= amount;
        to.transfer(amount);
    }

    function withdrawAllMoney(address payable to) public {
        uint balanceToSend = balanceReceived[msg.sender].totalBalance;
        balanceReceived[msg.sender].totalBalance = 0;
        to.transfer(balanceToSend);
    }
}
