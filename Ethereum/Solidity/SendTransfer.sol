//SPDX-License-Identifier: MIT

pragma solidity >=0.8.0;

/* > send function:
Send is the low-level counterpart of transfer and has a gas limit of 2300 gas as well.
It returns the status (of transaction) as a boolean.

transfer() vs send():
If transfer fails, the transfer will throw an error, but send returns the status as a boolean but the transaction won't fail..
*/

contract Sender {
    function withdrawTransfer(address payable toAddr) public {
        toAddr.transfer(10);
    }
    function withdrawSend(address payable toAddr) public {
        bool isSent = toAddr.send(10);
        require(isSent, "Sending fund was unsuccessful...!");
    }

    receive() external payable {}
}

contract ReceiverNoAction {
    function balance() public view returns(uint){
        return address(this).balance;
    }

    receive() external payable {}
}

contract ReceiverAction {
    uint public balanaceReceived;

    function balance() public view returns(uint) {
        return address(this).balance;
    }

    receive() external payable {
        balanaceReceived += msg.value;
    }
}