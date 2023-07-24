//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

contract Mapping {

    mapping(address => uint) public balanceReceived;

    function getBalance() public view returns(uint) {
        return address(this).balance;
    }

    function sendMoney() public payable {
        balanceReceived[msg.sender] += msg.value;
    }

    function withdrawMoney(address payable toAddr, uint inAmount) public {
        require(inAmount <= balanceReceived[msg.sender], "Not Enough Funds");
        balanceReceived[msg.sender] -= inAmount;
        toAddr.transfer(inAmount);
    }

    function withdrawAllMoney(address payable toAddr) public {
        uint balanceToSend = balanceReceived[msg.sender];
        balanceReceived[msg.sender] = 0;
        toAddr.transfer(balanceToSend);
    }
}