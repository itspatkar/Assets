const enableMetaMaskButton = document.querySelector('.enableMetamask');
const statusText = document.querySelector('.statusText');
const listenToEventsButton = document.querySelector('.startStopEventListener');
const contractAddr = document.querySelector('#address');
const eventResult = document.querySelector('.eventResult');

enableMetaMaskButton.addEventListener('click', () => {
    enableDapp();
});
listenToEventsButton.addEventListener('click', () => {
    listenToEvents();
});

let accounts;
let web3;

async function enableDapp() {
    if (typeof window.ethereum !== 'undefined') {
        try {
            accounts = await ethereum.request({
                method: 'eth_requestAccounts'
            });
            web3 = new Web3(window.ethereum);
            statusText.innerHTML = "Account: " + accounts[0];

            listenToEventsButton.removeAttribute("disabled");
            contractAddr.removeAttribute("disabled");
        } catch (error) {
            if (error.code === 4001) {
                // EIP-1193 userRejectedRequest error
                statusText.innerHTML = "Error: Need permission to access MetaMAsk";
                console.log('Permissions needed to continue.');
            } else {
                console.error(error.message);
            }
        }
    } else {
        statusText.innerHTML = "Error: Need to install MetaMask";
    }
};

let abi = [{
        "inputs": [],
        "stateMutability": "nonpayable",
        "type": "constructor"
    },
    {
        "anonymous": false,
        "inputs": [{
                "indexed": false,
                "internalType": "address",
                "name": "_from",
                "type": "address"
            },
            {
                "indexed": false,
                "internalType": "address",
                "name": "_to",
                "type": "address"
            },
            {
                "indexed": false,
                "internalType": "uint256",
                "name": "_amount",
                "type": "uint256"
            }
        ],
        "name": "TokensSent",
        "type": "event"
    },
    {
        "inputs": [{
                "internalType": "address",
                "name": "_to",
                "type": "address"
            },
            {
                "internalType": "uint256",
                "name": "_amount",
                "type": "uint256"
            }
        ],
        "name": "sendToken",
        "outputs": [{
            "internalType": "bool",
            "name": "",
            "type": "bool"
        }],
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "inputs": [{
            "internalType": "address",
            "name": "",
            "type": "address"
        }],
        "name": "tokenBalance",
        "outputs": [{
            "internalType": "uint256",
            "name": "",
            "type": "uint256"
        }],
        "stateMutability": "view",
        "type": "function"
    }
];

async function listenToEvents() {
    let contractInstance = new web3.eth.Contract(abi, contractAddr.value);
    contractInstance.events.TokensSent().on("data", (event) => {
    	eventResult.innerHTML = JSON.stringify(event) + "<br />=====<br />" + eventResult.innerHTML;
    });
}