import smtplib
# Here are the email package modules we'll need
from email.mime.image import MIMEImage
from email.mime.multipart import MIMEMultipart

msg = MIMEMultipart()

f = open ("sona.jpg", 'rb')
img = MIMEImage(f.read())
f.close()
msg.attach(img)

# Create the container (outer) email message.
msg = MIMEMultipart()
msg['Subject'] = 'Our family reunion'
# me == the sender's email address
# family = the list of all recipients' email addresses
msg['From'] = 'demian976@gmail.com'
mail_pwd = 'Ljh33487'
msg['To'] = 'ljh976@tamu.edu'
msg.preamble = 'Our family reunion'



#to = 'ljh976@tamu.edu'
#gmail_user = 'demian976@gmail.com'
#gmail_pwd = 'Ljh33487'
smtpserver = smtplib.SMTP("smtp.gmail.com",587)
smtpserver.ehlo()
smtpserver.starttls()
smtpserver.ehlo() # extra characters to permit edit
smtpserver.login(msg['From'], mail_pwd)
header = 'To:' + msg['To'] + '\n' + 'From: ' + msg['From'] + '\n' + 'Subject:testing \n'
print (header)
smtpserver.sendmail(msg['From'], msg['To'], msg.as_string())
print ('done!')
smtpserver.quit()