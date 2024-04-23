
# Networking

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

> To summarise, when you request a website, your computer needs to know the server's IP address it needs to talk to; for this, it uses DNS. Your computer then talks to the web server using a special set of commands called the HTTP protocol; the webserver then returns HTML, JavaScript, CSS, Images, etc., which your browser then uses to correctly format and display the website to you.


#### Miscs
- Web Server : A web server is a software that listens for incoming connections and then utilises the HTTP protocol to deliver web content to its clients. The most common web server software you'll come across is Apache, Nginx, IIS and NodeJS. A Web server delivers files from what's called its root directory, which is defined in the software settings. For example, Nginx and Apache share the same default location of /var/www/html in Linux operating systems, and IIS uses C:\inetpub\wwwroot for the Windows operating systems. So, for example, if you requested the file http://www.example.com/picture.jpg, it would send the file /var/www/html/picture.jpg from its local hard drive.

- Load Balancers : When a website's traffic starts getting quite large or is running an application that needs to have high availability, one web server might no longer do the job. Load balancers provide two main features, ensuring high traffic websites can handle the load and providing a failover if a server becomes unresponsive. examples of these algorithms are round-robin, which sends it to each server in turn, or weighted, which checks how many requests a server is currently dealing with and sends it to the least busy server.

- CDN (Content Delivery Networks) : A CDN can be an excellent resource for cutting down traffic to a busy website. It allows you to host static files from your website, such a JavaScript, CSS, Images, Videos, and host them across thousands of servers all over the world. When a user requests one of the hosted files, the CDN works out where the nearest server is physically located and sends the request there instead of potentially the other side of the world.

- Virtual Hosts : Web servers can host multiple websites with different domain names; to achieve this, they use virtual hosts. The web server software checks the hostname being requested from the HTTP headers and matches that against its virtual hosts (virtual hosts are just text-based configuration files). If it finds a match, the correct website will be provided. If no match is found, the default website will be provided instead.
