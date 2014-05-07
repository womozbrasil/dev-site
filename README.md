### OpenShift WordPress Developer Quickstart  
This quickstart is designed to allow you to push themes, plugins, and WordPress upgrades to your OpenShift gear using git.  Please note that this is a one way relationship.  If you install any themes or plugins on your OpenShift WordPress site, the next time you do a git push they will be gone.  All theme & plugin installations, and WordPress core upgrades should be done on your local development environment.  Then do a git add, git commit, and git push to move the changes to your OpenShift gear.  This quickstart is geared towards developers, only use it if you know what you are doing!!!!

#### Installation on your OpenShift gear  
Use the following command to launch an instance of this quickstart on OpenShift

	rhc app create wordpress php-5.4 mysql-5.5 --from-code=https://github.com/openshift-quickstart/openshift-wordpress-developer-quickstart.git
	
Once your gear is finished being created, you will need to visit your app-domain.rhcloud.com address and finish setting up your WordPress site.  If you would prefer, you an also use php-5.3 and/or mysql-5.1 instead of what is listed in the above command.  

#### Installing Plugins and Themes  
You can either download plugins and themes manually and place them in the correct folder, or use your local development environment instance of WordPress to install them.  Then you need to use git add, git commit, and git push to deploy them to your OpenShift gear.  

#### Uploads diectory  
Your local wp-content/uploads directory is not pushed to your OpenShift gear.  You will need to use the WordPress admin area on your OpenShift gear to upload files.  

#### Upgrading WordPress  
You should run the WordPress upgrade script in your local development environment, and then do a git add, git commit, and git push to deploy the changes to your OpenShift gear.  You will then need to visit your OpenShift url and execute the database upgrade script if required.  

#### Database changes  
No database changes, including creating of posts, pages, links, etc, in your local development environment will be pushed up to your OpenShift gear.  No changes to your database on your OpenShift gear will be pulled down when you do a git pull.  

#### Logging issues  with this quickstart
If you find an issue with this quickstart, you can either log an issue using the "issues" tab, or fork this repository, fix the issue, and do a pull request.  
