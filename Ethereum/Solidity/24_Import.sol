//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

// Import file "LibOwnable.sol"
import "./LibOwner.sol";

contract SampleContract is Owned {
    function receiveMoney() public payable {
    }

    function getBalance() public view returns(uint) {
        return address(this).balance;
    }

    function withdrawMoney(address to) public {
        require(isAdmin(to), "You are not an owner");
        payable(to).transfer(this.getBalance());
    }
}
