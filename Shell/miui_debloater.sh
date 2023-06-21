#!/bin/bash

packages=(
	"com.android.browser"
	"com.android.calendar"
	"com.android.chrome"
	"com.android.email"
	"com.facebook.appmanager"
	"com.facebook.services"
	"com.facebook.system"
	"com.google.android.apps.docs"
	"com.google.android.apps.maps"
	"com.google.android.apps.photos"
	"com.google.android.apps.tachyon"
	"com.google.android.feedback"
	"com.google.android.gm"
	"com.google.android.googlequicksearchbox"
	"com.google.android.music"
	"com.google.android.talk"
	"com.google.android.videos"
	"com.google.android.youtube"
	"com.mipay.wallet.id"
	"com.mipay.wallet.in"
	"com.miui.analytics"
	"com.miui.bugreport"
	"com.miui.miservice"
	"com.miui.notes"
	"com.miui.player"
	"com.miui.videoplayer"
	"com.miui.weather2"
	"com.xiaomi.mipicks"
	"com.xiaomi.payment"
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
