//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

contract ContractOne {
    mapping(address => uint) addressBalances;

    function deposit() public payable {
        addressBalances[msg.sender] += msg.value;
    }
}

contract ContractTwo {
    receive() external payable {}

    function depositContractOne(address inContractOne) public {
        /* Alternate: Calling smart contract 1 from contract 2:
        ContractOne one = ContractOne(inContractOne);
        one.deposit{value: 10, gas: 100000}(); */

        // Calling contract 1 implicitly from contract 2:
        bytes memory payload = abi.encodeWithSignature("deposit()");
        (bool success, ) = inContractOne.call{value: 10, gas: 100000}(payload); // Sending gas
        require(success);
    }
}