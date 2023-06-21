//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

contract MyContract {
    mapping(address => uint) public tokenBalance;

    event TokenSent(address fromAddr, address toAddr, uint inAmount);

    constructor(){
        tokenBalance[msg.sender] = 100;
    }

    function sendToken(address toAddr, uint inAmount) public returns(bool) {
        require(tokenBalance[msg.sender] >= inAmount, "Not Enough Funds...!");
        tokenBalance[msg.sender] -= inAmount;
        tokenBalance[toAddr] += inAmount;

        emit TokenSent(msg.sender, toAddr, inAmount);
        
        return true;
    }
}