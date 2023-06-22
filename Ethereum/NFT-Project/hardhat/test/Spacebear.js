const {expect} = require("chai");
const hre = require("hardhat");

describe("Spacebear", function(){
    it("is possible to mint a token", async() => {
        const Spacebear = await hre.ethers.getContractFactory("Spacebear");
        const spacebearInstance = await Spacebear.deploy();
        const [owner, otherAccount] = await ethers.getSigners();
        await spacebearInstance.safeMint(otherAccount.address);
        expect(await spacebearInstance.ownerOf(0)).to.equal(otherAccount.address);
    })
})