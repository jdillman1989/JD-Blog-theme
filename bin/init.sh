source "config.sh";
# requires config file with SERVER, WEBROOT, and STAGING variables defined
cat config.sh >> installStaging.sh;
cat stagingScript.sh >> installStaging.sh;
cat installStaging.sh | ssh $SERVER /bin/bash;
git remote add staging $SERVER:$WEBROOT/$STAGING.git;
rm installStaging.sh;