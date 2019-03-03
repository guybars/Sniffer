# The Sniffer is a small Linux-based device(mini pc) that lets parents monitor their children and how they use the internet - could also be used by employers to monitor employees or schools to monitor students. 
The Sniffer provides parents, for example, with a simple website, which is accessible from any device with an internet connection anywhere in the world, that displays what content their children see, and everything is updated instantly. 
The content could be website addresses, images, scripts, etc. 
This is done by 'sniffing' packets(HTTP requests) going from the pc to the router, which can be done only after being in the 'middle'(MITM) - making the router believe I am the target PC and making the target PC believe I am the router.
The bash scripts are doing exactly that, and sfter the HTTP requests have been captures, they are piped into a python scripts('processor.py') which 'processes' them - cuts and removes all the unnecessary data - and uploads them to the data base.
After all the organized data is stored in the database it is being displayed propely by the PHP script.
