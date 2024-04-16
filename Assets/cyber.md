<!-- https://tryhackme.com/r/resources/blog/free_path -->
<!-- https://tryhackme.com/path/outline/web -->
<!-- https://tryhackme.com/r/room/whatisnetworking -->
<!-- https://tryhackme.com/module/linux-fundamentals -->


### Cyber Security Terminology

- Offensive Security (Red Team) - Attacking : Offensive security is the process of breaking into computer systems, exploiting software bugs, and finding loopholes in applications to gain unauthorized access to them.

- Defensive Security (Blue Team) - Defending/Protecting/Preventing : Defensive security is the process of protecting an organization's network and computer systems by analyzing and securing any potential digital threats; learn more in the digital forensics room.

- Security Operations Center (SOC) : Security Operations Center (SOC) is a team of IT security professionals tasked with monitoring, preventing , detecting , investigating, and responding to threats within a company’s network and systems.

- Threat Intelligence : Threat intelligence aims to gather information to help the company better prepare against potential adversaries.

- Digital Forensics : Forensics is the application of science to investigate crimes and establish facts.

- Incident Response : An incident usually refers to a data breach or cyber attack; however, in some cases, it can be something less critical, such as a misconfiguration, an intrusion attempt, or a policy violation.

- Malware Analysis : Malware stands for malicious software. Software refers to programs, documents, and files that you can save on a disk or send over the network.

- OWASP : The Open Web Application Security Project is a nonprofit foundation focused on understanding web technologies and exploitations and provides resources and tools designed to improve the security of software applications.

- IDOR : Insecure direct object references (IDOR) are a type of access control vulnerability that arises when an application uses user-supplied input to access objects directly. Broken access control means that an attacker can access information or perform actions not intended for them.

- Virus : Virus is a piece of code (part of a program) that attaches itself to a program. It is designed to spread from one computer to another; moreover, it works by altering, overwriting, and deleting files once it infects a computer. The result ranges from the computer becoming slow to unusable.

- Trojan Horse : Trojan Horse is a program that shows one desirable function but hides a malicious function underneath. For example, a victim might download a video player from a shady website that gives the attacker complete control over their system.

- Ransomware : Ransomware is a malicious program that encrypts the user’s files. Encryption makes the files unreadable without knowing the encryption password. The attacker offers the user the encryption password if the user is willing to pay a “ransom.”

- HTML Injection : HTML Injection is a vulnerability that occurs when unfiltered user input is displayed on the page. If a website fails to sanitise user input (filter any "malicious" text that a user inputs into a website), and that input is used on the page, an attacker can inject HTML code into a vulnerable website.


---

### Tools

- gobuster : Gobuster is a tool used in penetration testing and cybersecurity assessments. It's primarily designed for discovering web content, directories, and files on web servers.
- pdfinfo : Portable Document Format (PDF) document information extractor (poppler-utils)
- exiftool : ExifTool is used to read and write metadata in various file types, such as JPEG images.


---

## Networking

### Requests And Responses
When we access a website, your browser will need to make requests to a web server for assets such as HTML, Images, and download the responses. Before that, you need to tell the browser specifically how and where to access these resources, this is where URLs will help.

### Uniform Resource Locator (URL)
A URL is predominantly an instruction on how to access a resource on the internet.

Ex:  http://user:password@tryhackme.com:80/view-room?id=1#task3

- Scheme: This instructs on what protocol to use for accessing the resource such as HTTP, HTTPS, FTP (File Transfer Protocol).
- User: Some services require authentication to log in, you can put a username and password into the URL to log in.
- Host: The domain name or IP address of the server you wish to access.
- Port: The Port that you are going to connect to, usually 80 for HTTP and 443 for HTTPS, but this can be hosted on any port between 1 - 65535.
- Path: The file name or location of the resource you are trying to access.
- Query String: Extra bits of information that can be sent to the requested path. For example, /blog?id=1 would tell the blog path that you wish to receive the blog article with the id of 1.
- Fragment: This is a reference to a location on the actual page requested. This is commonly used for pages with long content and can have a certain part of the page directly linked to it, so it is viewable to the user as soon as they access the page.

- URL Headers
- Request Method
- Status Code
- Web Server

### DNS (nslookup)
- DNS: The Domain Name System (DNS) is the phonebook of the Internet. Humans access information online through domain names, like google.com. Web browsers interact through Internet Protocol (IP) addresses. DNS translates domain names to IP addresses so browsers can load Internet resources. DNS servers eliminate the need for humans to memorize IP addresses such as 192.168.1.1 (in IPv4).
- DNS Servers
- Domain Hierarchy (TLD - Top-Level Domain, Second-Level Domain, Subdomain)


### Protocols

#### HTTP
- HyperText Transfer Protocol (HTTP) - 80 : Hypertext Transfer Protocol (HTTP) is the protocol that specifies how a web browser and a web server communicate. Your web browser requests content from the TryHackMe web server using the HTTP protocol.
- HyperText Transfer Protocol Secure (HTTPS) - 443 : HTTPS is the secure version of HTTP. HTTPS data is encrypted so it not only stops people from seeing the data you are receiving and sending, but it also gives you assurances that you're talking to the correct web server and not something impersonating it.

##### HTTP Methods:
HTTP methods are a way for the client to show their intended action when making an HTTP request.
- GET Request: This is used for getting information from a web server.
- POST Request: This is used for submitting data to the web server and potentially creating new records
- PUT Request: This is used for submitting data to a web server to update information
- DELETE Request: This is used for deleting information/records from a web server.

##### HTTP Status Codes
status code informs the client of the outcome of their request and also potentially how to handle it.
- 100-199 - Information Response
- 200-299 - Success
- 300-399 - Redirection
- 400-499 - Client Errors
- 500-599 - Server Errors

##### Common Codes:
- 200 - OK : The request was completed successfully.
- 201 - Created	: A resource has been created (for example a new user or new blog post).
- 301 - Moved Permanently : This redirects the client's browser to a new webpage or tells search engines that the page has moved somewhere else and to look there instead.
- 302 - Found : Similar to the above permanent redirect, but as the name suggests, this is only a temporary change and it may change again in the near future.
- 400 - Bad Request : This tells the browser that something was either wrong or missing in their request. This could sometimes be used if the web server resource that is being requested expected a certain parameter that the client didn't send.
- 401 - Not Authorised : You are not currently allowed to view this resource until you have authorised with the web application, most commonly with a username and password.
- 403 - Forbidden : You do not have permission to view this resource whether you are logged in or not.
- 405 - Method Not Allowed : The resource does not allow this method request, for example, you send a GET request to the resource /create-account when it was expecting a POST request instead.
- 404 - Page Not Found : The page/resource you requested does not exist.
- 500 - Internal Service Error : The server has encountered some kind of error with your request that it doesn't know how to handle properly.
- 503 - Service Unavailable : This server cannot handle your request as it's either overloaded or down for maintenance.

#### Headers
Headers are additional bits of data you can send to the web server when making requests. Although no headers are strictly required when making a HTTP request, you’ll find it difficult to view a website properly.

##### Common Request Headers:
These are headers that are sent from the client (usually your browser) to the server.
- Host: Some web servers host multiple websites so by providing the host headers you can tell it which one you require, otherwise you'll just receive the default website for the server.
- User-Agent: This is your browser software and version number, telling the web server your browser software helps it format the website properly for your browser and also some elements of HTML, JavaScript and CSS are only available in certain browsers.
- Content-Length: When sending data to a web server such as in a form, the content length tells the web server how much data to expect in the web request. This way the server can ensure it isn't missing any data.
- Accept-Encoding: Tells the web server what types of compression methods the browser supports so the data can be made smaller for transmitting over the internet.
- Cookie: Data sent to the server to help remember your information (see cookies task for more information).

##### Common Response Headers
These are the headers that are returned to the client from the server after a request.
- Set-Cookie: Information to store which gets sent back to the web server on each request (see cookies task for more information).
- Cache-Control: How long to store the content of the response in the browser's cache before it requests it again.
- Content-Type: This tells the client what type of data is being returned, i.e., HTML, CSS, JavaScript, Images, PDF, Video, etc. Using the content-type header the browser then knows how to process the data.
- Content-Encoding: What method has been used to compress the data to make it smaller when sending it over the internet.

#### Cookies
a small piece of data that is stored on your computer. Cookies are saved when you receive a "Set-Cookie" header from a web server. Then every further request you make, you'll send the cookie data back to the web server. Because HTTP is stateless (doesn't keep track of your previous requests).

