//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* > web3:
Connect to MetaMask using Injected Web3 Provider (on deply & run plugin) and
deploy the smart contract by clicking on deploy and confirm transaction on MetaMask. */

contract SampleContract {
    string public message = "Hello World";

    function updateString(string memory newMessage) public {
        message = newMessage;
    }
}