# 1dv607 - Workshop2

### Contributors: Pepyn Swagemakers (ps222nq) & Sebastian Gustavsson (sg222pm)

### Please send email to sg222pm@student.lnu.se for link to live demo

### Link to diagrams
Note: you must be logged in with your LNU email address to view in Draw.io, otherwise preview resolution is very low

[Link to Create Member sequence diagram](https://drive.google.com/file/d/0B4Dl3vAlGIepQUE5TEVscFVMUmM/view?usp=sharing)
[Link to List Member sequence diagram](https://drive.google.com/file/d/0B4Dl3vAlGIepRFVhM0hZOG1uenM/view?usp=sharing)

[Link to overview of classes](https://drive.google.com/file/d/0B4Dl3vAlGIepTDYzSWw3WlY1WkU/view?usp=sharing)
[Link to previous class and sequence diagrams](https://drive.google.com/file/d/0B4Dl3vAlGIepN25NSlJTT0V3QUU/view?usp=sharing)

### [Workshop resources](http://coursepress.lnu.se/kurs/objektorienterad-analys-och-design-med-uml/workshops-2/workshop-2-design/)

#### Peer reviews Workshop 2
#####Group lo222hd
Source: https://github.com/LindaOtt/1dv607-workshop-2   
Review: https://docs.google.com/document/d/1BLggs2DjvXPP2yeOyvDMSaZq-fl_Dv3WlcPf64SK7hc/edit

#####Group an222yp
Source: https://github.com/axnion/1DV607   
Review: https://docs.google.com/document/d/1y47g_JWfMbWLJnuYDFefpMuK9Rn7RDgbBlJgIdAU69M/edit


#Get the application up and running
1. [Download and run rlerdorfs preconfigured vagrant box for testing php apps:](https://github.com/rlerdorf/php7dev)
2. Open a terminal window, cd to the path you cloned the box into, make sure the vagrant box is running (execute command: vagrant up)
3. execute command: vagrant ssh 
4. vagrant@php7dev:~$ cd /var/www/default/
  * nginx is sharing this folder as default
5. vagrant@php7dev:~$ git clone https://github.com/sebastiangus/1dv607.git
7. The code is now up and running
6. Visit your vagrant machines url: http://localhost/1dv607
  * At this point there is no member register, the file needs to be created and ownership and write permissions needs to be set to the file, for the user www-data.
6. vagrant@php7dev:~$ touch /controller/register/registry.txt
  * This command creates the file without opening the file.
7. vagrant@php7dev:~$ cd /var/www/default/controller/register/
8. vagrant@php7dev:~$ sudo chown www-data registry.txt
  * Change owner of the file to www-data
9. vagrant@php7dev:~$ sudo chmod 644 registry.txt 
  * Adds write permission to the file for the owner, read only for the users group and read only for everyone. [Read more about chmod and chown](http://www.unixtutorial.org/2014/07/difference-between-chmod-and-chown/)

No the application is up and running with a read and writable registry.txt
