personaldns
===========

A neat way of managing your own personal DNS using Dropbox.

I access my PLEX library (myplexapp.com) and some other tools on my remote machine from various places. Unfortunately my ISP keeps changing my IP address which makes life difficult when the IP you've memorized suddenly changes. Also, services like Dyndns don't keep track of this. I created a little workflow so that I could easily access my PLEX (plexapp.com) server at home from anywhere. I already owned a personal domain so it eliminated the need for me to manage something via dyndns.org.

How does it work?
-----------------
All that's required are two files and little bit of command link knowledge on OSX.

1. writeiptodropbox.com
	This is a simple shell script that gets the IP address of the machine that it runs on. It requests http://wtfismyip.com/text which returns your IP. It then writes that IP address into a file in the Public folder of your dropbox, using the current machine/computer name for the file name (yourmachine.local.txt). You can write it to anywhere, but you will want to access this file later, so it must be world readable, which is why the public folder seems like the best place.

2. crontab.txt
	This is the crontab entry that you use to schedule the writing of the above file. It needs to update regulary as my ISP is constantly changing my IP. It simply tells your machine to call the above file at set intervals. In this case every 1 minute "/1"

Setting up domains
------------------
If you own your domain, it's then really simple to set up something like myplex.mydomain.com.

* Set up a subdomain on your host.
* Point it to a subfolder like /myplex
* Insert the index.php PHP file in /myplex

This PHP file opens the file related to the machine that I'm interested in, reads the IP of that and then simply redirects to the appropriate location. You can do this for any of your machine and with any domain. Let's say you wanted to access your Transmission Web client from outside. Simply create a subdomain transmission.yourdomain.com and set the redirect in your index.php to point to $machineipaddress:9091.