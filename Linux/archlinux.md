# Arch Linux Installation

*Based on Arch [Wiki](https://wiki.archlinux.org/index.php/Installation_guide) for UEFI system.*


## &bull; Pre Installation

### Set Keyboard Layout :
List all available layouts -
```
localectl list-keymaps
```

Select -
```
loadkeys [keymap]
```
*EN_US is default keyboard layout.*


### Internet Connection :
#### Wired -
LAN/wired connection should get connected automatically.

#### WiFi -
Enter interactive menu `iwctl`
- `device list`
- `station wlan0 connect SSID` *(for device wlan0)*

#### Test connection -
```
ping -c 3 archlinux.org
```


### Update System Clock :
#### Timezone status -
```
timedatectl status
```

#### List timezones -
```
timedatectl list-timezones
```

#### Select timezone -
```
timedatectl set-timezone Asia/Kolkata
```

#### Enable NTP -
```
timedatectl set-ntp true
```

*Ensure system clock is accurate.*


### Partitioning :

Verify boot mode, run -
```
ls /sys/firmware/efi/efivars
```
If command shows directory without error, then system is booted in UEFI mode. If directory does not exist, system may be booted in BIOS (Legacy Boot).


#### Create 2 partition as follows -

| Name | Partition | Size | Type |
| --- | --- | --- | --- |
| sda1 | `/boot` | 300M | EFI |
| sda2 | `/home` | remaining space | ext4 |

**These values are strongly related for my pc.**

Type `lsblk` for cheking partitions.


#### Create Partitions -

1. Enter in the interactive menu
```
fdisk /dev/sda
```
2. Create new GPT partition table `g`
3. Create boot partition `n`
    - partition number : default *(enter)*
    - first sector : default *(enter)*
    - last sector (size) : +300M
    - change partition type to `efi`
        - run : `t`
        - type `1`
4. Create home partition `n`
    - partition number : default *(enter)*
    - first sector : default *(enter)*
    - last sector (size) : remaining all space *(enter)*
5. Save changes with `w`
6. Quit fdisk with `q`


#### Format Partition -

1. ESP `/dev/sda1` with FAT32 :
```
mkfs.fat -F32 /dev/sda1
```

2. Home `/dev/sda2` with EXT4 :
```
mkfs.ext4 /dev/sda2
```


#### Mount Partitions -

1. Mount root :
```
mount /dev/sda2 /mnt
```

Create EFI dir : `mkdir -p /mnt/boot`

2. Mount EFI dir :
```
mount /dev/sda1 /mnt/boot
```


<br>

## &bull; Installation

### Set Mirrors :
1. Sync pacman database: `pacman -Syyy`
2. Install reflector: `pacman -S reflector`
3. Run: `reflector -c [Country] -a 6 --sort rate --save /etc/pacman.d/mirrorlist`

*To enable color in pacman - uncomment line `color` in `/etc/pacman.conf`*

### Install Base Packages :
```
pacstrap /mnt base base-devel linux-lts linux-firmware linux-lts-headers vim
```
I use vim, you can install whichever text editor you want.

### Generate fstab :
```
genfstab -U /mnt >> /mnt/etc/fstab
```

### Chroot :
Now, change root into the new system.
```
arch-chroot /mnt
```


### Configuring System

### Timezone :
List all -
```
timedatectl list-timezones
```

Creating symbolic link with timezone -
```
ln -sf /usr/share/zoneinfo/Asia/Kolkata /etc/localtime
```


### Set Hardware Clock :
```
hwclock --systohc --utc
```


### Locale :

1. Open `/etc/locale.gen` file and uncomment your locale, `en_US UTF-8` in my case.

2. Set system wide locale *(add your locale in `/etc/locale.conf`)* -
```
echo LANG=en_US.UTF-8 > /etc/locale.conf
```
OR
```
localectl set-locale LANG=en_US.UTF-8
```

3. Generate locale with -
```
locale-gen
```

4. Set keymap -
```
echo KEYMAP=[keymap] > /etc/vconsole.conf
```
OR
```
localectl set-keymap [keymap]
```

List all keymap layouts with
```
localectl list-keymaps
```
OR
```
find /usr/share/kbd/keymaps
```

*Default keymap layout is US.*


### Network :

Set Hostname -
```
echo myhostname > /etc/hostname
```

Now, open file `/etc/hosts` and write:
```
127.0.0.1   localhost
::1     localhost
127.0.0.1   myhostname.localdomain    myhostname
```

> Replace myhostname with your host/computer name


### Set root password :
```
passwd
```
*Enter your password.*


### Install Required Packages :
```
pacman -S networkmanager network-manager-applet wireless_tools wpa_supplicant xdg-utils xdg-user-dirs git
```
*Install `os-prober` if you're dual booting windows with linux.*

Enable network manager servive -
```
systemctl enable NetworkManager
```


### Install Bootloader :
1. Install packages -
```
pacman -S grub efibootmgr
```

2. Install GRUB -
```
grub-install --target=x86_64-efi --efi-directory=/boot --bootloader-id=GRUB
```

3. Generate GRUB configuration -
```
grub-mkconfig -o /boot/grub/grub.cfg
```


### Add User :
```
useradd -mG wheel [user-name]
```

Create [user] password -
```
passwd [user-name]
```
*You can use same password as of root.*

Now run,
```
EDITOR=vim visudo
```
And uncomment line `%wheel ALL=(ALL) ALL` to allow user of wheel group to have sudo privilages.
You can put your fav editor instead of vim like `EDITOR=nano visudo`.

<br>

**All needed configuration have done, now exit arch-chroot.**
```
exit
```

Unmount all partitions -
```
umount -a
```

Reboot -
```
reboot
````

*You can remove your live USB stick now.*


## &bull; Post Installation

### Internet Connection :
Run `nmtui` and connect to WiFi. LAN/Wired connection should get connected automatically.

### Display Server :
```
sudo pacman -S xorg-server
```

### GPU drivers (intel CPUs) :
```
sudo pacman -S xf86-video-intel
````
For other GPUs select your required driver by running -
```
sudo pacman -Ss xf86-video
```

### Sound/Audio Server :
```
sudo pacman -S pulseaudio
```

### Display Manager :
*Install your choice of login/display manager.*
```
sudo pacman -S lightdm lightdm-gtk-greeter lightdm-gtk-greeter-settings
```
Enable lightdm service -
```
sudo systemctl enable lightdm
```

**Base system is ready, Now you can install your taste of DE/WM.**
