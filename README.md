# openshift-wordpress-cartridge
install with:

`rhc app create website php-5.4 mysql-5.5 --from-code=https://github.com/openshift-quickstart/openshift-wordpress-developer-quickstart.git`

  * Add plugins and themes
  * Add `.htaccess` file
  * git add commit push --> automatic deploy
  * Import database with phpmyadmin
  * put uploads with: 

`scp uploads.zip accountnumber@website-account.rhcloud.com:/var/lib/openshift/accountnumber/app-root/data/uploads.zip`
