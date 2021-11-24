#Becwork controll panel

clear #Clear console after start script

#Color codes.
green_echo (){ echo "\033[32m$1\033[0m"; }
yellow_echo () { echo "\033[33m$1\033[0m"; }
red_echo () { echo "\033[32m$1\033[0m"; }
cecho () { echo "\033[36m$1\033[0m"; }

#Panel Gui.
yellow_echo "================================================================================"
green_echo  "                              Web Contorl panel                                 "
yellow_echo "================================================================================"
red_echo "Please select your action!"
yellow_echo "================================================================================"
cecho "1)Start server
2)Build dev
3)Build production
4)Manage Config
5)Run tests







"
yellow_echo "================================================================================"
red_echo "99. Install all"
red_echo "0. Exit panel"
yellow_echo "================================================================================"
#End of Gui

if [ -z $1 ]; then
	read phase
else
	phase=$1
fi

case  $phase in
1|start)
	sh scripts/start.sh
;;
2|start)
	sh scripts/build_dev.sh
;;
3|start)
	sh scripts/build_prod.sh
;;
4|start)
	sh scripts/config_manager.sh
;;
5|start)
	php tests/ResponseTest.php
	php tests/CryptTest.php
	php tests/HashTest.php
;;
99|start)
	sh scripts/install.sh
;;
0|quit) #Close Control panel methode
	red_echo "Control panel exited!"
;;
*) #Show if vote not found
	red_echo "Your vote not found!"
esac

#End of script
