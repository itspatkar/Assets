//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
> Events:
- Event is the special data-structure in Ethereum to provide the outside world with better access to return values.
- These events or logs are stored on blockchain and are accessible using address of the contract till the contract is present on the blockchain.
- An event is emitted, it stores the arguments passed in transaction logs.
- An event generated is not accessible from within contracts, not even the one which have created and emitted them.
- That is the logging facility of Ethereum. Events are a way to access this logging facility.
- Functions can't return data externally, use event instead.
- Application listen to an event through the RPC interface of the ethereun client.
- Events are inheritable members of the contract.
- The logs and its event data is not accessible from within the contracts.

- Events are used for return values, data storage and trigger.
- Events are cannot be retrived from within smart contracts.
- Events arguments marked as indexed can be search for.
- Events are cheap.

> Storing data is very expensive on the ethereum blockchain:
- Store data off-chain and store only proof (hash) -> notary
- Store data on another blockchain such as IPFS
- Store data in events logs
*/

contract Events {
    event ReceiveMoney(address from, uint amount);
    event WithdrawMoney(address from, uint amount);
    event WithdrawMoneyTo(address from, uint amount);

    function receiveMoney() public payable {
        emit ReceiveMoney(msg.sender, msg.value);
    }

    function getBalance() public view returns(uint) {
        return address(this).balance;
    }

    function withdraw() public {
        payable(msg.sender).transfer(this.getBalance());
        emit ReceiveMoney(msg.sender, this.getBalance());
    }

    function withdrawTo(address payable _to) public {
        _to.transfer(this.getBalance());
        emit ReceiveMoney(_to, this.getBalance());
    }
}
