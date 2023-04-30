#!/bin/bash

packages=(
	"com.facebook.appmanager"
	"com.facebook.services"
	"com.facebook.system"
	"com.google.android.apps.messaging"
	"com.google.android.apps.subscriptions.red"
	"com.google.android.youtube"
	"com.miui.analytics"
	"com.xiaomi.glgm"
	"com.xiaomi.mipicks"
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
