//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

contract SmartWallet {
    address payable public owner;
    mapping(address => uint) public allowance;
    mapping(address => bool) public isAllowedToSend;

    // Guardians:
    address payable nextOwner;
    uint guardianResetCount;
    uint public constant confirmationsFromGuardianForReset = 3;
    mapping(address => bool) public guardians;

    constructor(){
        owner =  payable(msg.sender);
    }

    function setAllowance(address toAddr, uint inAmount) public {
        require(msg.sender == owner, "You're not the owner, Aborting...!");
        allowance[toAddr] = inAmount;

        if(inAmount > 0){
            isAllowedToSend[toAddr] = true;
        } else {
            isAllowedToSend[toAddr] = false;
        }
    }

    function transfer(address payable toAddr, uint inAmount, bytes memory payload) public returns(bytes memory) {
        //require(msg.sender == owner, "You're not the owner, Aborting...!");
        if(msg.sender != owner){
            require(isAllowedToSend[msg.sender], "You're not allowed to send.");
            require(allowance[msg.sender] >= inAmount, "You're trying to send money than allowed, Aborting...!");

            allowance[msg.sender] -= inAmount;
        }

        //toAddr.transfer(inAmount);
        (bool success, bytes memory returnData) = toAddr.call{value: inAmount}(payload);
        require(success, "Aborting...!, Call was not successful.");

        return returnData;
    }

    // Guardian:
    function setGuardian(address inGuardian, bool isGuardian) public {
        require(msg.sender == owner, "You're not the owner, Aborting...!"); 
        guardians[inGuardian] = isGuardian;
    }
    function setNewOwner(address payable newOwner) public {
        require(guardians[msg.sender], "You're not gurdian of this wallet, Aborting...!");
        if(nextOwner != newOwner){
            nextOwner = newOwner;
            guardianResetCount = 0;
        }
        guardianResetCount++;

        if(guardianResetCount >= confirmationsFromGuardianForReset){
            owner = nextOwner;
            nextOwner = payable(address(0));
        }
    }

    receive() external payable {}
}

contract Consumer {
    function getBalance() public view returns(uint) {
        return address(this).balance;
    }

    function deposit() public payable {}
}
