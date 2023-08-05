// SPDX-License-Identifier: GPL-3.0

pragma solidity ^0.8.0;

contract Ownable {
    address payable owner;

    constructor(){
        owner =  payable(msg.sender);
    }

    modifier onlyOwner() {
        require(isOwner(), "You are not the owner!");
        _;
    }

    function isOwner() public view returns (bool) {
        return (msg.sender == owner);
    }
}

contract Item {
    uint public priceInWei;
    uint public index;
    uint public pricePaid;

    ItemManager parentContract;

    constructor(ItemManager parentCont, uint price, uint ind){
        priceInWei = price;
        index = ind;
        parentContract = parentCont;
    }

    receive() external payable {
        require(pricePaid == 0, "Item is paid alredy!");
        require(priceInWei == msg.value, "Only full payments allowed!");
        pricePaid += msg.value;
        (bool success, ) = address(parentContract).call{value: msg.value}(abi.encodeWithSignature("triggerPayment(uint256)", index));
        require(success, "The transaction was not successful, cancelling!");
    }

    fallback() external payable {
    }
}

contract ItemManager is Ownable {
    event SupplyChainStep(uint itemIndex, uint step, address itemAddress);

    enum SupplyChainState{ Created, Paid, Delivered }

    struct S_Item {
        Item item;
        string identifier;
        uint itemPrice;
        ItemManager.SupplyChainState state;
    }

    mapping (uint => S_Item) public items;
    uint itemIndex;

    function createItem(string memory id, uint price) public onlyOwner {
        Item item = new Item(this, price, itemIndex);
        items[itemIndex].item = item;
        items[itemIndex].identifier = id;
        items[itemIndex].itemPrice = price;
        items[itemIndex].state = SupplyChainState.Created;

        emit SupplyChainStep(itemIndex, uint(items[itemIndex].state), address(item));
        itemIndex++;
    }

    function triggerPayment(uint index) public payable  {
        require(items[index].itemPrice == msg.value, "Only full payment accepted!");
        require(items[index].state == SupplyChainState.Created, "Item is further in the chain!");
        items[index].state = SupplyChainState.Paid;

        emit SupplyChainStep(itemIndex, uint(items[itemIndex].state), address(items[itemIndex].item));
    }

    function triggerDelivery(uint index) public onlyOwner {
        require(items[index].state == SupplyChainState.Paid, "Item is further in the chain!");
        items[index].state = SupplyChainState.Delivered;

        emit SupplyChainStep(itemIndex, uint(items[itemIndex].state), address(items[itemIndex].item));
    }
}
