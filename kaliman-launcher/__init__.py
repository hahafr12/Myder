import os

def kali_baslat():
    print("\033[32m[*] Kali Linux ortamına giriliyor...\033[0m")
    os.system("proot-distro login kali")
