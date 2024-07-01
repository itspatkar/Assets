# Mount Root Partition:
sudo mount /dev/sda2 /mnt/

# Create EFI Mount Point:
sudo mkdir -p /mnt/boot/efi/

# Mount EFI:
sudo mount /dev/sda1 /mnt/boot/efi/

# Chroot Into Mounted System:
sudo xchroot /mnt /bin/bash

