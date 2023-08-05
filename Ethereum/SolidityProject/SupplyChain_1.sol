// SPDX-License-Identifier: GPL-3.0

pragma solidity ^0.8.0;

contract ItemManager {
    event SupplyChainStep(uint itemIndex, uint step);

    enum SupplyChainState{ Created, Paid, Delivered }

    struct S_Item {
        string identifier;
        uint itemPrice;
        ItemManager.SupplyChainState state;
    }

    mapping (uint => S_Item) items;
    uint itemIndex;

    function createItem(string memory id, uint price) public {
        items[itemIndex].identifier = id;
        items[itemIndex].itemPrice = price;
        items[itemIndex].state = SupplyChainState.Created;

        emit SupplyChainStep(itemIndex, uint(items[itemIndex].state));
        itemIndex++;
    }

    function triggerPayment(uint index) public payable  {
        require(items[index].itemPrice == msg.value, "Only full payment accepted!");
        require(items[index].state == SupplyChainState.Created, "Item is further in the chain!");
        items[index].state = SupplyChainState.Paid;

        emit SupplyChainStep(itemIndex, uint(items[itemIndex].state));
    }

    function triggerDelivery(uint index) public {
        require(items[index].state == SupplyChainState.Paid, "Item is further in the chain!");
        items[index].state = SupplyChainState.Delivered;
        
        emit SupplyChainStep(itemIndex, uint(items[itemIndex].state));
    }
}
