clear #Clear console after start script

#Color codes.
green_echo (){ echo "\033[32m$1\033[0m"; }
yellow_echo () { echo "\033[33m$1\033[0m"; }
red_echo () { echo "\033[32m$1\033[0m"; }
cecho () { echo "\033[36m$1\033[0m"; }


#Delete old build if exist
if [ -d "build/" ] 
then
	sudo rm -r build/
fi

green_echo "Building website..."




#Build website
mkdir build/
cp -R framework/ build/framework/
cp -R public/ build/public/
cp -R scripts/ build/scripts/
cp -R site/ build/site/
cp -R tests/ build/tests/
cp composer.json build/
cp composer.lock build/
cp config.php build/
cp panel.sh build/


green_echo "Website builded in build folder"
green_echo "Warning: Check config before upload on server!"