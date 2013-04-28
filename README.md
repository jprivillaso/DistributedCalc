DistributedCalc
===============

This is a distributed Calculator that calls different servers depending on the operation to do. This is a very simple
example of Distributed Applications

It has 3 folders:

1. WSCalc1 = This folder have the respect operations of Sum and Multiply 
2. WSCalc2 = This folder have the respect operations of Subtract and Divide
3. WebCalc = This server, calls receive a call from a form in html, and make the operations. It invokes a 
different server depending on the operation. The service is transparent to the user. This is thin client.
It has an xml file with the server location.
4. RobotCalc = This server makes the same as WebCalc, but it reads all from an xml file, not only the location. 
The xml file has the params, the method, and the also the location of the servers.


JUAN PABLO RIVILLAS - 2013


