import os
import subprocess

def localxpose_setup():
    print("=== LocalXpose Tool ===")
    
    # Token ID girişini al
    token = input("LocalXpose Token ID'nizi girin: ").strip()
    if not token:
        print("❌ Token ID boş olamaz!")
        return

    # Token ID ile kimlik doğrulama
    print("🔐 LocalXpose kimlik doğrulaması yapılıyor...")
    auth_result = subprocess.getoutput(f"./lx auth {token}")
    print(auth_result)

    # HTTP sunucusu başlat (örnek olarak port 8080)
    port = input("Hangi portu LocalXpose ile tünellemek istersiniz? (varsayılan: 8080): ").strip()
    if not port:
        port = "8080"

    print(f"🚀 {port} portu üzerinden HTTP tüneli başlatılıyor...")
    os.system(f"./lx tunnel http --port {port}")

if __name__ == "__main__":
    localxpose_setup()
