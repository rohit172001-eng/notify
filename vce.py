#Linux version & Windows
import pymysql
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
import requests
from bs4 import BeautifulSoup
fromaddr="sender_email"
msg=MIMEMultipart()
msg['From']="RK"
msg['Subject']="New Notification in vce website..."
s=smtplib.SMTP('smtp.gmail.com',587)
s.starttls()
s.login("sender_email","mail-password")
db1=pymysql.connect('localhost','username','password','kp')
curobj1=db1.cursor()
db=pymysql.connect('localhost','username','password','vasavi',port=3307)
curobj=db.cursor()
print("Connected to database sucessfully....")
url='https://www.vce.ac.in'
response=requests.get(url)
print(response)
#soup=BeautifulSousoup=BeautifulSoup(response.text, "html.parser")
#news=soup.find_all('div',class_='newsScroller')
#print(news[0:1])
#data=news[0].text.split('\n')
#data=[str(r) for r in data]
#data.encode('ascii','ignore')
#print(data)
db_list=[]
curobj.execute("select data from notify")#bringinging notifications already present in database
vastpl=curobj.fetchall()
db_list=[ele for tupl in vastpl for ele in tupl]#tuple to list conversion
i=1
while(i):
    web_list=[]
    print("Checking website.........")
    sleep(600)
    response=requests.get(url)
    print(response)
    soup = BeautifulSoup(response.text, "html.parser")
    news = soup.find_all('div', class_='newsScroller')
    print(type(news[0:1]))
    data=news[0].text.split('\n')
    data=[str(r) for r in data]
    #bringing all notifications from vce website
    for a in data:
        if a!="":
            web_list.append(a)
#uncomment the below two lines if you havent stored any data in ur database
#	curobj.execute("insert into notify(data) values('%s')"%(db.escape_string(a)))
#	db.commit()
    #web_list.append("its working")#for testing
    for i in web_list:

        if i not in db_list:#if there is a notification in website but not present in ur database

            print("Website updated")
            print(i)
            text=i+" Please visist https://www.vce.ac.in"
            msg.attach(MIMEText(text,'plain'))
            text=msg.as_string()
            curobj1.execute("select email from users")#fetch all emails present in database which were uploaded from website
            emailtpl=curobj1.fetchall()
            email_list=[ele for tpl in emailtpl for ele in tpl]
            for j in email_list:
                msg['To']=j
                s.sendmail("sender_email",j,text)

                curobj.execute("insert into notify(data) values('%s')"%(db.escape_string(i)))
                db.commit()
                curobj.execute("select data from notify")
                vastpl=curobj.fetchall()#upload the new notification in database and fetch all notifications from db again
                db_list=[ele for tpl in vastpl for ele in tpl]




print(web_list)
db.close()
db1.close()
