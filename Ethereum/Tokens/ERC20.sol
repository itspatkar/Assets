// SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

import "@openzeppelin/contracts/token/ERC20/ERC20.sol";
import "@openzeppelin/contracts/access/AccessControl.sol";


/* > Token:
Tokens can be used to represent anything.
"Token" and "Cryptocurrency" are often used interchangeably; all cryptocurrencies are tokens, but not all tokens are cryptocurrencies.

Tokens can be divided into two general categories, fungible and non-fungible.
- Fungible Tokens:
Fungible tokens are tokens that are non-unique, one token of the same type is interchangeable with another token of the same type.
For instance, money is a type of fungible asset.

- Non-fungible tokens (NFTs):
Non-fungible tokens (NFTs) are tokens where every token is unique.
One token may be similar to another, but they have properties that ensure no two tokens can ever be the same.

> ERC-20:
Ethereum Request for Comment 20 (ERC-20) is the technical standard for fungible tokens created using the Ethereum blockchain.
ERC-20 allows developers to create smart-contract-enabled tokens that can be used with other products and services.
These tokens are a representation of an asset, right, ownership, access, cryptocurrency, or
anything else that is not unique in and of itself but can be transferred.

ERC-20 Contents:
ERC-20 is a list of functions and events that must be implemented into a token for it to be considered ERC-20 compliant.
These functions (called methods in the ERC) describe what must be included in the smart-contract-enabled token, while events describe an action.

The functions a token must have are:
- TotalSupply: The total number of tokens that will ever be issued
- BalanceOf: The account balance of a token owner's account
- Transfer: Automatically executes transfers of a specified number of tokens to a specified address for transactions using the token
- TransferFrom: Automatically executes transfers of a specified number of tokens from a specified address using the token
- Approve: Allows a spender to withdraw a set number of tokens from a specified account, up to a specific amount
- Allowance: Returns a set number of tokens from a spender to the owner

The events that must be included in the token are:
- Transfer: An event triggered when a transfer is successful
- Approval: A log of an approved event (an event)

What's the Difference Between ETH and ERC-20:
Ether (ETH) is the native token used by the Ethereum blockchain and network as a payment system for verifying transactions.
ERC-20 is the standard for creating smart contract-enabled fungible tokens to be used in the Ethereum ecosystem. */

contract CoffeeToken is ERC20, AccessControl {
    bytes32 public constant MINTER_ROLE = keccak256("MINTER_ROLE");

    event CoffeePurchased(address indexed receiver, address indexed buyer);

    constructor() ERC20("CoffeeToken", "CFE") {
        _grantRole(DEFAULT_ADMIN_ROLE, msg.sender);
        _grantRole(MINTER_ROLE, msg.sender);
    }

    function mint(address to, uint256 amount) public onlyRole(MINTER_ROLE) {
        _mint(to, amount);
    }
    function buyOneCoffee() public {
        _burn(_msgSender(), 1);
        emit CoffeePurchased(_msgSender(), _msgSender());
    }
    function buyOneCoffeeFrom(address account) public {
        _spendAllowance(account, _msgSender(), 1);
        _burn(account, 1);
        emit CoffeePurchased(_msgSender(), account);
    }
}