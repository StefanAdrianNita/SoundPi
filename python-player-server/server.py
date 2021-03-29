from SimpleWebSocketServer import SimpleWebSocketServer, WebSocket
import os

os.system("omxplayer /var/www/html/files/bell.mp3")

isPlaying = "none"
filePlaying = ""
volume = 14

class mediaplayer(WebSocket):

    def handleMessage(self):
        pass

    def handleConnected(self):
        print(self.address, 'connected')
        self.sendMessage("1."+isPlaying)
        self.sendMessage("2."+filePlaying)
        self.sendMessage("3."+str(volume))

    def handleClose(self):
        print(self.address, 'closed')

server = SimpleWebSocketServer('192.168.1.6', 6969, mediaplayer)
server.serveforever()