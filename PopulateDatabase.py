import pandas as pd
import numpy as np
df=pd.read_csv('contacts.csv')
df1=df[['contact_id','first_name','middle_name','last_name']]
df2=df[['contact_id','home_address','home_city','home_state','home_zip']]
df2['Address_type']='home'
df2.rename(columns={"home_address": "address", "home_city": "city","home_state":"state","home_zip":"zip"},inplace=True)

df3=df[['contact_id','work_address','work_city','work_state','work_zip']]
df3['Address_type']='work'
df3.rename(columns={"work_address": "address", "work_city": "city","work_state":"state","work_zip":"zip"},inplace=True)

df4=pd.concat([df2,df3])
df4.sort_values(by=['contact_id'])

df4['Address_id']=list(range(len(df4)))

cf1=df[['contact_id','work_phone']]
cf1.head()
cf1.replace(np.nan,' - - ',inplace=True) 

split_data=cf1['work_phone'].str.split("-")
data=split_data.to_list()
names=['area_code','cellno','abc']
cf5=pd.DataFrame(data,columns=names)

cf5['contact_id']=cf1['contact_id']
cf5['cellno']=cf5['cellno']+'-'+cf5['abc']
cf5.drop('abc', axis=1, inplace=True)
cf5['phone_type']='work'

cf1=df[['contact_id','home_phone']]
cf1.replace(np.nan,' - - ',inplace=True) 
split_data=cf1['home_phone'].str.split("-")
data=split_data.to_list()
names=['area_code','cellno','abc']
cf6=pd.DataFrame(data,columns=names)

cf6['contact_id']=cf1['contact_id']
cf6['phone_type']='home'
cf6['cellno']=cf6['cellno']+'-'+cf6['abc']
cf6.drop('abc', axis=1, inplace=True)

cf1=df[['contact_id','cell_phone']]
cf1.replace(np.nan,' - - ',inplace=True) 
split_data=cf1['cell_phone'].str.split("-")
data=split_data.to_list()
names=['area_code','cellno','abc']
cf7=pd.DataFrame(data,columns=names)

cf7['contact_id']=cf1['contact_id']
cf7['phone_type']='cell'
cf7['cellno']=cf7['cellno']+'-'+cf7['abc']
cf7.drop('abc', axis=1, inplace=True)

cf8=pd.concat([cf5,cf6,cf7])
cf8.sort_values(by=['contact_id'],inplace=True)
cf8['Phone_id']=list(range(len(cf8)))

cf9=df[['contact_id','birth_date']]
cf9['date']='YYYY-MM-dd'
cf9['date_id']=list(range(len(cf9)))

import sys
file = open('contacts.sql', 'w')
sys.stdout = file

df1.fillna(-1, inplace=True)
for i,j in df1.iterrows():
    frame = list(j)
    for k in range(len(frame)):
        if frame[k] == -1:
            frame[k] = ''
    str_t = ",".join('"' + str(x) + '"' for x in frame)
    print("INSERT INTO contact VALUES (" +str_t + ");")
print('---------------')   

df4=df4[['Address_id','contact_id','Address_type','address','city','state','zip']]
df4.fillna(-1,inplace=True)   
for i,j in df4.iterrows():
    frame = list(j)
    for k in range(len(frame)):
        if  frame[k] == -1:
            frame[k] = ''
    str_t = ",".join("'" + str(x) + "'" for x in frame )
    print("INSERT INTO address VALUES (" +str_t + ");")
print('---------------')   
    
cf8=cf8[['Phone_id','contact_id','phone_type','area_code','cellno']]
cf8.fillna(-1,inplace=True)   
for i,j in cf8.iterrows():
    frame = list(j)
    for k in range(len(frame)):
        if  frame[k] == -1:
            frame[k] = ''
    str_t = ",".join("'" + str(x) + "'" for x in frame )
    print("INSERT INTO phone VALUES (" +str_t + ");")
print('---------------')   
    
cf9=cf9[['date_id','contact_id','date','birth_date']]
cf9.fillna(-1,inplace=True)   
for i,j in cf9.iterrows():
    frame = list(j)
    for k in range(len(frame)):
        if  frame[k] == -1:
            frame[k] = ''
    str_t = ",".join("'" + str(x) + "'" for x in frame )
    print("INSERT INTO bday VALUES (" +str_t + ");")
    
file.close()

