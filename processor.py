#importing necessary libraries
import time 
import sys
import random
import datetime
import mysql.connector

#connecting to the SQL database
conn = mysql.connector.Connect(host="sniffer2.mysql.database.azure.com" , port=3306,database="sniffer2", user="root2@sniffer2",password="mySQL123")
#conn = mysql.connector.Connect(user="root2@sniffer2",password="mySQL123", host="sniffer2.mysql.database.azure.com" ,port=3306,database="sniffer2")
c = conn.cursor()
print("Connected to MYSQL DB")
#creates the needed table if not exits
def create_table():
    c.execute('CREATE TABLE IF NOT EXISTS stuffToPlot(datastamp TEXT, keyword TEXT)')
#delets all data 
def clear_table():
    c.execute('DELETE FROM stuffToPlot;')
    conn.commit()

#inserts the website link and date to the table   
def dynamic_data_entry(link):
    unix = time.time()
    keyword = link 
    print(keyword)
    datestamp = str(datetime.datetime.fromtimestamp(unix).strftime('%Y-%m-%d %H:%M:%S'))
    print(datestamp)
    c.execute("INSERT INTO stuffToPlot (datastamp, keyword) VALUES (%s,%s)",(datestamp,keyword))
    conn.commit()
   # c.close()
   # conn.close()
#splits the HTTP request and returns the website URL
def splitter():
    import sys 
    
    file =open('urls.txt','w')
    for line in sys.stdin:
        a = line 
        b = a.split(' ')
        print(b) 
        if b[5] == '"GET':
           dynamic_data_entry(b[6])
           file.write(b[6])
           if b[6] != None:
              print(b[6])
           file.write('\n')
           file.write('\n')
      
    file.close()

create_table()
while True:
   splitter()
#clear_table()






