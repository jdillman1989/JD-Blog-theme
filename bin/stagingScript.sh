
echo "Installing WordPress";
echo $PUBLIC;
cd $PUBLIC;
wget http://wordpress.org/latest.tar.gz;
tar xfz latest.tar.gz;
mv wordpress/* ./;
rmdir ./wordpress/;
rm -f latest.tar.gz;

echo "Installing Git deployment";
cd $WEBROOT;
mkdir $STAGING.git;
cd $STAGING.git;
git init --bare;
cd hooks;
touch post-receive;
echo "#!/bin/sh
unset GIT_DIR;
export GIT_WORK_TREE=$WEBROOT/build;
export GIT_DIR=$WEBROOT/$STAGING.git;
git checkout -f master;
cd $WEBROOT/build;
gulp;
rsync -r $WEBROOT/build/wp-content/* $PUBLIC/wp-content/" >> post-receive;

echo "Installing Gulp";
cd $WEBROOT;
mkdir build;
cd build;
touch package.json;
echo '{
  "name": "Jadle",
  "version": "1.1.0",
  "devDependencies": {
    "gulp": "^3.9.0",
    "gulp-sass": "^2.0.4",
    "gulp-uglify": "^1.0.1"
  }
}' >> package.json;
npm install;

echo "Setting up deployments";
cd $WEBROOT/$STAGING.git/hooks;
chmod 775 post-receive;
echo "Complete";