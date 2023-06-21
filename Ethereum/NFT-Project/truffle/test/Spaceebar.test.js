const Spacebear = artifacts.require("Spacebear");

contract("Spacebear", (accounts) => {
    it("Should credit an NFT to a specific account", async() => {
        const spacebearInstance = await Spacebear.deployed();
        await spacebearInstance.safeMint(accounts[1], "spacebear_1.json");
        assert.equal(await spacebearInstance.ownerOf(0), accounts[1], "Owner of token 1 is not equal to account 2");
    })
})