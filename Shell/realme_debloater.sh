#!/bin/bash

packages=(
	"com.coloros.weather.service"
	"com.coloros.weather2"
	"com.finshell.fin"
	"com.glance.internet"
	"com.heytap.browser"
	"com.oplus.games"
	"com.opos.cs"
	"com.realmestore.app"
	"com.redteamobile.roaming"
)

count_s=0
count_f=0

echo -e "Uninstalling...\n"

for pkg in "${packages[@]}"; do
	status=$(adb shell pm uninstall -k --user 0 $pkg)

	if [ "$status" = "Success" ]
	then
		echo "Success: $pkg"
		((count_s++))
	else
		echo "Failed: $pkg"
		((count_f++))
	fi
done

echo -e "\nStatus:"
echo "$count_s applications uninstalled successfully"
echo "$count_f uninstall failed..!"
