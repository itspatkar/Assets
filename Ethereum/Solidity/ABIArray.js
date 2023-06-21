(async() => {
    const address = "";
    const abiArray = [
        {
            "inputs": [],
            "name": "myUint",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "inUint",
                    "type": "uint256"
                }
            ],
            "name": "setMyUint",
            "outputs": [],
            "stateMutability": "nonpayable",
            "type": "function"
        }
    ];

    const contractInstance = new web3.eth.Contract(abiArray, address);
    console.log(await contractInstance.methods.myUint().call());

    let accounts = await web3.eth.getAccounts();
    let txResult = await contractInstance.methods.setMyUint(456).send({from: accounts[0]});

    console.log(await contractInstance.methods.myUint().call());
    console.log(txResult);
})