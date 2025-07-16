<?php

function banner() {
    echo "\033[1;31m";
    echo "  __  __       _           \n";
    echo " |  \\/  |     | |          \n";
    echo " | \\  / | __ _| | _____ ___\n";
    echo " | |\\/| |/ _` | |/ / __/ _ \\\n";
    echo " | |  | | (_| |   < (_|  __/\n";
    echo " |_|  |_|\\__,_|_|\\_\\___\\___|\n";
    echo "\n";
    echo "+-----------------------------+\n";
    echo "+ Author  : YourName          +\n";
    echo "+ GitHub  : github.com/yourGH +\n";
    echo "+ Tool    : Myder             +\n";
    echo "+ Version : 0.1               +\n";
    echo "+ Date    : " . date("d-m-Y") . "       +\n";
    echo "+-----------------------------+\n\n";

    echo "\033[1;33m";
    echo "--admin,   -a   Search Admin Pages\n";
    echo "--upload,  -u   Search Upload Pages\n";
    echo "--cms,     -c   CMS Scan\n";
    echo "--domain,  -d   Subdomain Scan\n";
    echo "--nmap,    -n   Nmap Port Scan\n";
    echo "--update,  -U   Update Wordlist\n\n";
    echo "Example: php myder.php http://example.com --admin\n\n";
    echo "\033[0m";
}

function runTool($url, $option) {
    echo "[+] Target URL: $url\n";
    switch ($option) {
        case '--admin':
        case '-a':
            echo "[*] Searching for admin pages...\n";
            // örnek wordlist
            $paths = ['admin/', 'admin/login.php', 'adminpanel/'];
            foreach ($paths as $path) {
                $full = $url . '/' . $path;
                $headers = @get_headers($full);
                if ($headers && strpos($headers[0], '200')) {
                    echo "[+] Found: $full\n";
                }
            }
            break;

        case '--upload':
        case '-u':
            echo "[*] Searching for upload pages...\n";
            // upload wordlist
            $paths = ['upload/', 'fileupload.php', 'uploads/'];
            foreach ($paths as $path) {
                $full = $url . '/' . $path;
                $headers = @get_headers($full);
                if ($headers && strpos($headers[0], '200')) {
                    echo "[+] Found: $full\n";
                }
            }
            break;

        case '--cms':
        case '-c':
            echo "[*] Detecting CMS...\n";
            $content = @file_get_contents($url);
            if (strpos($content, 'wp-content')) echo "[+] WordPress detected.\n";
            elseif (strpos($content, 'Joomla!')) echo "[+] Joomla detected.\n";
            else echo "[-] CMS not detected.\n";
            break;

        case '--domain':
        case '-d':
            echo "[*] Subdomain scan (simulated)...\n";
            echo "[~] Subdomain scan feature coming soon!\n";
            break;

        case '--nmap':
        case '-n':
            echo "[*] Running port scan using Nmap (requires system Nmap)...\n";
            system("nmap -F " . parse_url($url, PHP_URL_HOST));
            break;

        case '--update':
        case '-U':
            echo "[*] Updating wordlist...\n";
            // Simülasyon
            echo "[✓] Wordlist updated.\n";
            break;

        default:
            echo "[-] Invalid option!\n";
            break;
    }
}

if ($argc < 3) {
    banner();
    exit;
}

$url = $argv[1];
$option = $argv[2];

banner();
runTool($url, $option);

?>
