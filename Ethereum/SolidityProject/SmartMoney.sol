//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

contract SmartMoney {
    uint public totalBalance;

    function deposit() public payable {
        totalBalance += msg.value;
    }

    function getBalance() public view returns(uint){
        return address(this).balance;
    }

    function withdraw() public {
        payable(msg.sender).transfer(getBalance());
    }

    function withdrawTo(address payable toAddr) public {
        toAddr.transfer(getBalance());
    }
}