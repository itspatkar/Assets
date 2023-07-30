//SPDX-License-Identifier: MIT

pragma solidity ^0.8.0;

/*
> Structure:
- Structs are used to define own data types.
*/

contract Structure {
    struct Book {
        uint id;
        string name;
        bool available;
    }

    Book public book1;

    function setBook(uint _id, string memory _name, bool _avail) public {
        book1 = Book(_id, _name, _avail);
    }

    function setBookID(uint _id) public {
        book1.id = _id;
    }

    function setBookName(string memory _name) public {
        book1.name = _name;
    }

    function setBookAvail(bool _avail) public {
        book1.available = _avail;
    }
}
