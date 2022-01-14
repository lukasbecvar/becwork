#Becwork controll panel

clear #Clear console after start script

#Color codes.
green_echo (){ echo "\033[32m$1\033[0m"; }
yellow_echo () { echo "\033[33m$1\033[0m"; }
red_echo () { echo "\033[32m$1\033[0m"; }
cecho () { echo "\033[36m$1\033[0m"; }

#Panel Gui.
yellow_echo "================================================================================"
green_echo  "                                  Web panel                                     "
yellow_echo "================================================================================"
red_echo "Please select your action!"
yellow_echo "================================================================================"
cecho "1)Start maintenance
2)Stop maintenance










"
yellow_echo "================================================================================"
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
	sed -i 's/"disable"/"enable"/' config.php
	red_echo "Config: maintenance mode is enabled!"
;;
2|start)
	sed -i 's/"enable"/"disable"/' config.php
	red_echo "Config: maintenance mode is disabled!"
;;
0|quit) #Close Control panel methode
	sh panel.sh
;;
*) #Show if vote not found
	red_echo "Your vote not found!"
esac

#End of script
