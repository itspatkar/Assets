//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

contract Bank {
    address payable bank;
    uint totalBalance;
    
    struct AccountInfo {
        bool accountExist;
        uint accountBalance;
    }

    mapping(address => AccountInfo) account;

    constructor(){
        bank = payable(msg.sender);
    }

    function getTotalBalance() public view returns(uint) {
        require(msg.sender == bank, "You don't have access...!");
        return totalBalance;
    }

    function getBalance(address inAddr) public view returns(uint) {
        require(account[inAddr].accountExist, "Account does not exist...!");
        return account[inAddr].accountBalance;
    }
    function createAccount(address inAddr) public {
        account[inAddr].accountExist = true;
    }
    function deposit(address inAddr, uint inAmount) public payable {
        require(account[inAddr].accountExist, "Account does not exist...!");
        totalBalance += inAmount;
        account[inAddr].accountBalance += inAmount;
        bank.transfer(inAmount);
    }
    function withdraw(address payable inAddr, uint inAmount) public {
        require(msg.sender == bank && account[inAddr].accountExist, "Account does not exist...!");
        totalBalance += inAmount;
        account[inAddr].accountBalance += inAmount;
        inAddr.transfer(inAmount);
    }

    receive() external payable {}
}