//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
> transfer() function:
- transfer function sends the specedified ether to the address mentioned.
- The receiving smart contract should have fallback function define or else the transfer call will throw an error.
- There is a gas limit of 2300 gas.
- If the transfer fails, it will throw an error.
*/

contract TransferETH {
    uint public balanceReceived;

    function receiveMoney() public payable {
        balanceReceived += msg.value;
    }

    function getBalance() public view returns(uint) {
        return address(this).balance;
    }

    function withdraw() public {
        payable(msg.sender).transfer(this.getBalance());
        balanceReceived = 0;
    }

    function withdrawTo(address payable to) public {
        to.transfer(this.getBalance());
        balanceReceived = 0;
    }
}
