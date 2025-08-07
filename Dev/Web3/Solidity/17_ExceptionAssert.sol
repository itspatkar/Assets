//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
> assert() function:
- Assert is used to check invariants.
- Invariants are states that contract or variables should never reach.
- It is used to check for code that should never be false.
- Failing assertion probably means that there is a bug.
- Assert cannot return error string.
- It does not return gas, it consume gas.
*/

contract Exceptions {
    mapping(address => uint8) public balanceReceived;

    function receiveMoney() public payable {
        assert(msg.value == uint8(msg.value));
        balanceReceived[msg.sender] += uint8(msg.value);
        assert(balanceReceived[msg.sender] >= uint8(msg.value));
    }

    function withdrawMoney(address payable toAddr, uint8 amount) public {
        require(amount <= balanceReceived[msg.sender], "Not Enough Funds");
        assert(balanceReceived[msg.sender] >= balanceReceived[msg.sender] - amount);
        balanceReceived[msg.sender] -= amount;
        toAddr.transfer(amount);
    }
}
