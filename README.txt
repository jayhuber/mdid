Moodle 2.x MDID2 Activity Plugin
================================

The Madison Digital Image Database (MDID) is a freely distributed, open source web application developed at James Madison University. MDID is a digital media management system with sophisticated tools for discovering, aggregating, and presenting digital media in a wide variety of learning spaces.

http://sites.jmu.edu/mdidhelp/

Installation Instructions for MDID2 can be found at:
http://mdid.org/mdidwiki/index.php?title=Installing_MDID2



This activity allows for MDID version 2 slideshows to display in your Moodle 2.x course.

After installing the plugin, you will need to provide credentials to your viewer account (student) at the system level (Admin sets up).

When adding the activity to your course, faculty will provide the Full URL to the MDID Gallery.  

When a student opens the activity, they are automatically logged into the MDID system based upon the system permissions specified when the plugin was installed, and then taken directly to the Gallery specified in the URL.

Maintainer: Jay Huber (jhuber@colum.edu)

------------------------------------

INSTALLATION

Requirements:

1) 	Moodle 2.2.x, 2.3.x
	The plug-in might work with previous versions of 2, but has only been tested with this version.

2)	Iframe and Javascript are used to access the MDID slideshow.  The system automagically logs in the student account and displays the MDID2 URL inside a Frame. 


How to install:

1)  Copy the "mdid" folder into the following folder: moodle/mod/. 
2)  Load the "Notifications" page on the Moodle home page - this will create database tables used by the activity and you will have an opportunity to configure the student account to access to the MDID activity.


Changing the student access account:
1)  As admin navigate to Site Administration -> Plugins -> Activity modules -> MDID

