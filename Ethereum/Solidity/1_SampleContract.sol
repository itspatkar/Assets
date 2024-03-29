//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
> Connect to web3:
- Connect to MetaMask using Injected Web3 Provider (on deploy & run plugin).
- deploy the smart contract by clicking on deploy and confirm transaction on MetaMask.

> pragma:
- The pragma keyword is used to enable certain compiler features or checks.
- A pragma directive is always local to a source file, so you have to add the pragma to all your files if you want to enable it in your whole project.
- It tells the EVM (Ethereum Virtual Machine) which compiler to use to compile the smart contracts.
*/

contract SampleContract {
    string public myString = "Hello World";

    function updateString(string memory str) public {
        myString = str;
    }
}
