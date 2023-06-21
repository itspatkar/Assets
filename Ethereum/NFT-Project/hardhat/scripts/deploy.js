(async () => {
    try {
        // Contract:
        const Spacebear = await hre.ethers.getContractFactory("Spacebear");
        const spacebearInstance = await Spacebear.deploy();
        //await spacebearInstance.deployed();
        await spacebearInstance.waitForDeployment();

        //console.log(`Deploy contract at ${spacebearInstance.address}`);

        const address = await spacebearInstance.getAddress();
        console.log(`Deploy contract at: ${address}`);

    } catch(e) {
        console.error(e);
        process.exitCode = 1;
    }
})()