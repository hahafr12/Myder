#!/data/data/com.termux/files/usr/bin/bash

clear
echo -e "\e[32m[✔] Termux Kali Linux Kurulumu Başlatılıyor...\e[0m"
sleep 1

echo -e "\e[33m[•] Paketler güncelleniyor...\e[0m"
pkg update -y && pkg upgrade -y

echo -e "\e[33m[•] Gerekli paketler kuruluyor (proot-distro)...\e[0m"
pkg install proot-distro -y

echo -e "\e[34m[•] Kali Linux indiriliyor...\e[0m"
proot-distro install kali

echo -e "\e[36m[✓] Kali Linux başarıyla kuruldu!\e[0m"
sleep 1

echo -e "\e[32m[+] Kali terminaline giriliyor...\e[0m"
sleep 2
proot-distro login kali
