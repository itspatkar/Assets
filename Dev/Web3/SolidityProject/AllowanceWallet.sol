// SPDX-License-Identifier: GPL-3.0

pragma solidity ^0.8.0;

contract Allowance {
    event AllowanceChanged(address indexed forWho, address indexed fromWhom, uint amount);

    address public owner;
    mapping (address => uint) public allowance;

    constructor() {
        owner = msg.sender;
    }

    modifier onlyOwner(){
        require(owner == msg.sender, "You are not owner!");
        _;
    }

    modifier ownerOrAllowed(uint amount) {
        require(isOwner(msg.sender) || allowance[msg.sender] >= amount, "You are not allowed!");
        _;
    }

    function isOwner(address who) public view returns (bool) {
        if(who == owner) return true;
        else return false;
    }

    function transferOwnership(address to) public onlyOwner {
        owner = to;
    }

    function addAllowance(address who, uint amount) public onlyOwner {
        emit AllowanceChanged(who, msg.sender, amount);
        allowance[who] = amount;
    }

    function reduceAllowance(address who, uint amount) internal {
        emit AllowanceChanged(who, msg.sender, allowance[who]-amount);
        allowance[who] -= amount;
    }
}

contract Wallet is Allowance {
    event MoneyReceived(address indexed beneficiary, uint amount);
    event MoneyWithdraw(address indexed to, uint amount);

    function withdrawMoney(address payable to, uint amount) public ownerOrAllowed(amount) {
        require(amount <= address(this).balance, "Not enough funds!");
        if(!isOwner(to)) reduceAllowance(msg.sender, amount);
        emit MoneyWithdraw(to, amount);
        to.transfer(amount);
    }

    // Receive money
    receive() external payable {
        emit MoneyReceived(msg.sender, msg.value);
    }
}
