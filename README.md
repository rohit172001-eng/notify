# notify
Get notified when website content changes
Here I've taken my college website, whenever there is a new notification in college website the registered users will get a notification via email. 

Working: first of all notifications are fetched using web scrapping and stored in a database. Next vce.py fetches new notifications from website and compares with that of database. If there is a new notification mails are sent to all the users.
