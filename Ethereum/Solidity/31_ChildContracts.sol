//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

contract Wallet {
    // Create instance of child contract:
    PayamentReceived public payment;

    function payContract() public payable {
        payment = new PayamentReceived(msg.sender,msg.value);
    }
}

// Child Contract:
contract PayamentReceived {
    address public from;
    uint public amount;
    
    constructor(address _from, uint _amount){
        from = _from;
        amount = _amount;
    }
}
