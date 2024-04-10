## Blockchain
A blockchain is a digitized, decentralized ledger of transactions. Blockchains record a continuously growing list of records, called blocks, which are linked and secured using cryptography.

- A blockchain is a distributed database that maintains a continuously growing list of records, called blocks, secured from tampering and revision.
- Each block contains a timestamp and a link to a previous block.
- A blockchain is typically managed by a peer-to-peer network collectively adhering to a protocol for validating new blocks.
- Once recorded, information cannot be altered without the alteration of all subsequent blocks.

### Types of blockchain :
- Public:
    - Anyone is allowed to join and participate in the consensus
    - Fully decentralized, secured and immutable ledge system
    - Transactions are anonymous but transparent to everyone
- Private:
    - A single organization will have authority over the network
    - Privacy, faster output and power efficient
    - Simplified data handling process but not open to everyone
- Federated or Consortium:
    - Multiple organizations influences the blockchain newtork
    - Decentralized, extremely fast and scalable system
    - Network regulations preserves security and privacy
- Hybrid:
    - Authorative access, only certain elements are private
    - Flexible controll over what data is kept public and private
    - Decentralized regulated and highly scalable system

### Genesis Block
The Genesis Block, also known as Block 0, is the very first block upon which additional blocks in a blockchain are added. It is effectively the ancestor that every other block can trace its lineage back to since every block references the one preceding it. The Genesis Block is a critical element of a blockchain network because it serves as the foundation for the entire network.

### Blockchain Explorer :
A blockchain explorer is a platform that allows people to search and navigate a blockchain. They're not necessary for using the blockchain. However, they offer a valuable service to those who wish to inspect a blockchain in detail. You can view transactions on the blockchain, smart contract code, account balances, and more.

### Smart Contracts :
Smart contracts are self-executing contracts with predefined rules and conditions encoded on a blockchain. They are written in programming languages such as Solidity (for Ethereum) or Vyper and operate autonomously without the need for intermediaries.

### ABI Bytecode :
ABI stands for Application Binary Interface. The ABI is typically provided as a JSON (JavaScript Object Notation) file or an ABI-encoded string. Smart contracts are written in high-level languages like Solidity and compiled into bytecode, which is then deployed on the blockchain or Ethereum Virtual Machine (EVM) for execution. The ABI Array contains all functions, inputs, and outputs, as well as all variables and their types, from a smart contract. Inside, there are assembly opcodes telling the EVM during execution of a smart contract where to jump to. Those jump destinations are the first 4 bytes of the keccak hash of the function signature.

### Web3.JS :
Web3.JS is a popular JavaScript library that allows you to interact with the Ethereum network (and smart contracts). If you want to build an application, you can use Web3.JS to connect to the Ethereum blockchain and make the front-end of your application.

### Consensus Mechanism :
Blockchain networks rely on a consensus mechanism to achieve agreement among nodes about the validity of transactions and the order in which they are added to the blockchain. Common consensus mechanisms include Proof of Work (PoW), Proof of Stake (PoS), and Practical Byzantine Fault Tolerance (PBFT).

- Proof of Work (PoW) : In a PoW-based blockchain network, miners compete to solve a complex mathematical puzzle or algorithm. The process of solving this puzzle is called mining.
- Proof of Stake (PoS) : In a PoS-based blockchain network, participants are called validators. Validators are chosen to create new blocks and validate transactions based on the amount of cryptocurrency they hold and "stake" in the network.

### PoW and PoS :
In a PoW system, miners compete to find a solution to an equation that will allow them to add a block to the blockchain. In a PoS system, validators stake their cryptocurrency on the chain they want to mine. The more they stake, the more likely they will solve the next block. When they reach a consensus on a block, they get rewarded with more of the cryptocurrency. Critics argue that PoS may lead to centralization.

### Tokens :
A token refers to a digital asset or a unit of value that is created, issued, and transferred within a blockchain system. Tokens can represent various types of assets, such as cryptocurrencies, utility tokens, security tokens, or even non-fungible tokens (NFTs).

### Fungible Tokens :
A fungible token is a type of digital asset that is interchangeable with other tokens of the same type. Fungible tokens are identical, non-unique and indistinguishable from one another, meaning that each token holds the same value and can be exchanged on a one-to-one basis.
- Non-Unique (Uniform)
- Interchangeable
- Divisible
- ERC-20 or ERC-777 Standard

### Non-Fungible Tokens (NFTs) :
Non-Fungible Tokens are unique digital assets that represent ownership or proof of authenticity for a specific item or piece of content. NFTs have gained popularity in digital art, collectibles, virtual real estate, and gaming. Each NFT has a distinct value and cannot be exchanged on a one-to-one basis like cryptocurrencies. One token may be similar to another, but they have properties that ensure no two tokens can ever be the same.
- Unique
- Non-Interchangeable
- Non-Divisible
- ERC-721 Standard


## Ethereum
Ethereum is the blockchain platform that enables the creation and execution of smart contracts and decentralized applications (dApps).

### ERC-20 :
ERC-20 stands for Ethereum Request for Comment 20, which is a technical standard or protocol used for creating and implementing fungible tokens on the Ethereum blockchain. It defines a set of rules and standards that a token contract must follow in order to be considered an ERC-20 token.
ERC-20 allows developers to create smart-contract-enabled tokens that can be used with other products and services.

#### ERC-20 Contents:
ERC-20 is a list of functions and events that must be implemented into a token for it to be considered ERC-20 compliant. These functions (called methods in the ERC) describe what must be included in the smart-contract-enabled token, while events describe an action.

The functions a token must have are:
- TotalSupply: The total number of tokens that will ever be issued
- BalanceOf: The account balance of a token owner's account
- Transfer: Automatically executes transfers of a specified number of tokens to a specified address for transactions using the token
- TransferFrom: Automatically executes transfers of a specified number of tokens from a specified address using the token
- Approve: Allows a spender to withdraw a set number of tokens from a specified account, up to a specific amount
- Allowance: Returns a set number of tokens from a spender to the owner

The events that must be included in the token are:
- Transfer: An event triggered when a transfer is successful
- Approval: A log of an approved event (an event)

#### ETH vs ERC-20:
Ether (ETH) is the native token used by the Ethereum blockchain and network as a payment system for verifying transactions. ERC-20 is the standard for creating smart contract-enabled fungible tokens to be used in the Ethereum ecosystem.


## Truffle
Truffle is a development framework for Ethereum; It is used to streamline the process of building, testing, and deploying smart contracts on the Ethereum network. Truffle provides a suite of tools and libraries that aid in the development and management of Ethereum-based decentralized applications (dApps).

- Truffle downloads a solidity compiler in the background (the version is defined in truffle-config).
- Then it looks in the contracts folder for all solidity files and runs them through the solidity compiler.
- From the compiled contracts it creates json-artifacts, which contain not only the ABI, but also the bytecode and the AST and much more.
- When we deploy the code using truffle migrations, it will also contain the contract address on a specific network.

### Ganache :
Truffle Ganache is a local blockchain development tool that provides a personal Ethereum blockchain for development and testing purposes. It is part of the Truffle suite. Ganache allows developers to create a local Ethereum network with predefined accounts and pre-funded Ether. This allows you to simulate a blockchain environment on your local machine without the need to connect to a public or test network.

#### Truffle Folder Structure:
- `Contracts` : This directory contains the Solidity smart contracts for your project. It usually has a separate file for each contract, along with any libraries or interfaces.
- `Migrations` : The migrations folder contains JavaScript files that handle deploying and updating your smart contracts to the Ethereum network. Each migration script represents a deployment or an update, and they are executed in order.
- `Test` : This directory is used for writing automated tests for your smart contracts. It usually contains JavaScript or Solidity test files that ensure your contracts behave as expected.
- `Truffle Config` : The truffle-config.js (or truffle.js) file holds the configuration settings for your Truffle project. It specifies the network settings, compiler version, and other project-specific options.
- `Build` : The build folder is automatically generated by Truffle and contains the compiled contracts and build artifacts. It includes the ABI (Application Binary Interface) JSON files, bytecode, and other necessary information for interacting with your contracts.
- `App` (Optional) : If you are building a decentralized application (DApp), you may have an "app" or "client" folder that contains the frontend code (HTML, CSS, JavaScript, etc.) for your DApp. This folder is not specific to Truffle but is commonly included in Truffle projects for convenience.

#### Truffle Commands:
- `truffle init` : Initializes a new Truffle project by creating the necessary directory structure and configuration files.
- `truffle compile` : Compiles the smart contracts written in Solidity language into bytecode that can be executed on the Ethereum Virtual Machine (EVM). It generates artifacts refer to the JSON files generated during the compilation process. These artifact files contain metadata and information about the compiled smart contracts, including their bytecode, application binary interface (ABI), and other details.
- `truffle migrate` : Deploys the compiled smart contracts to a specified Ethereum network. It uses migration scripts to manage the deployment process.
- `truffle test` : Runs the test cases written for your smart contracts using a built-in testing framework (usually Mocha and Chai). It helps ensure that your contracts behave as expected.
- `truffle console` : Opens a Truffle console, which is an interactive JavaScript environment connected to an Ethereum network. It allows you to interact with deployed contracts and test their functionality manually.
- `truffle develop` : Starts a local development blockchain, also known as the Truffle Develop Network. It provides a pre-configured blockchain environment for rapid contract development and testing.
- `truffle networks` : Lists the available network configurations defined in the Truffle project's configuration file. You can define multiple networks for different Ethereum networks like mainnet, ropsten, rinkeby, etc.
- `truffle create` : Creates new contract, migration, test, or other files/templates within the Truffle project's directory structure.
- `truffle build` : Compiles and generates an optimized build of your DApp for production deployment. It typically creates a bundled version of your frontend code and deploys it to an appropriate location.

#### Deploy smart contracts on ganache (cli):
- Start ganache: `ganache`
- Migrate in new terminal: `truffle migrate --network ganache`


## Hardhat :
Hardhat is a development environment for Ethereum smart contracts. It is a popular alternative to Truffle and provides a comprehensive toolset for compiling, testing, and deploying smart contracts.

- Set up your project:
    - Create a new directory for your project.
    - Run `npm init` to initialize a new Node.js project (if you haven't already).
    - Install Hardhat by running: `npm install --save-dev hardhat`.
- Configure Hardhat:
    - Create a `hardhat.config.js` file in the root of your project directory.
    - In the configuration file, you can specify the network settings, compiler version, plugins, and other options.
- Write your smart contracts:
    - Create a contracts directory in your project and write your Solidity smart contracts in separate .sol files.
    - You can import other contracts, libraries, or interfaces as needed.
- Write tests:
    - Create a test directory in your project.
    - Write automated tests for your contracts using the testing framework of your choice (e.g., Mocha or Hardhat's built-in testing framework).
- Compile your contracts:
    - Run `npx hardhat compile` to compile your Solidity contracts.
    - The compiled contracts and build artifacts will be generated in a build directory.
- Run tests:
    - Execute your test scripts to ensure that your contracts behave as expected.
    - Run `npx hardhat test` to run the tests located in the test directory.
    - Hardhat will automatically deploy the contracts to its built-in local network for testing.
- Deploy contracts:
    - Define deployment scripts in the scripts directory or create a new script specifically for deploying contracts.
    - Use the Hardhat API to deploy your contracts to a specific network or the local development network.
    - Run the deployment script using: `npx hardhat run <script-name>`.
    - Deploy on hardhat development node with: `npx hardhat node` (starts local ethereum node i.e.  hardhat Network).
    - Run scripts: `npx hardhat run --network localhost scripts/deploy.js`
- Interact with contracts:
    - Use the Hardhat console or write JavaScript/TypeScript scripts to interact with your deployed contracts.