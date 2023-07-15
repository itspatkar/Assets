/* > web3.js :
A web3.js is JavaScript library for building on Ethereum.
It is a collection of libraries that allow you to interact with a local or remote ethereum node using HTTP, IPC or WebSocket.

web3.eth.getAccounts() : return all the available accounts

web3.eth.getBalance() : return balance (in Wei) of specified account

web3.utils.fromWei(): return balance in Ether from Wei */

(async () => {
    let accounts = await web3.eth.getAccounts();
    console.log(accounts, accounts.length);

    let balance = await web3.eth.getBalance(accounts[0]);
    console.log(balance);

    let balanceETH = web3.utils.fromWei(balance.toString(), "ether");
    console.log(balanceETH);
})()
