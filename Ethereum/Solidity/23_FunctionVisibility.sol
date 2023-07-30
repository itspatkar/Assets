//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/* Function Visibility:
> Public:
- Can be called internally and externally

> Private:
- Only for the contract, not externally reachable and not via derived contracts

> External:
- Can be called from other contracts
- Can be called externally
- But can't be called within the contracts

> Internal:
- Only from the contract itself or from derived contracts
- Can't be invoked by the transaction
*/

contract SampleContract {
    address owner = msg.sender;

    // Accessible internally and externally
    function getOwnerPublic() public view returns (address) {
        return getOwnerPrivate();
    }

    // Accessible only within contract (not externally or derived)
    function getOwnerPrivate() private view returns (address) {
        return owner;
    }

    // Accessible only interally (or derived)
    function getOwnerInternal() internal view returns (address) {
        return owner;
    }

    // Accessible only externally (not within contract)
    function getOwnerExternal() external view returns (address) {
        return getOwnerInternal();
    }
}
