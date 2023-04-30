//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* > Address type:
Ethereum supports transfer of Ether and communication between Smart Contracts.
Addresses can be stored in Smart Contracts and can be used to transfer Ether from the Smart Contract
to an address with the help of the type address variable.
An address type can hold up to 20 bytes (160 bits), which is the size of an Ethereum address.*/

contract Address {
    address public myAddress;

    function setAddress(address inAddress) public {
        myAddress = inAddress;
    }

    function getAddressBalance() public view returns(uint){
        return myAddress.balance;
    }
}