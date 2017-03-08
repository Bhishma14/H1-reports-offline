#import the library used to query a website
import urllib2
import json
import MySQLdb
import time

#import the Beautiful soup functions to parse the data returned from the website
#from bs4 import BeautifulSoup
def open_url(page):
	time.sleep(1)
	hackerone = str(page)
	opener = urllib2.build_opener()
	opener.addheaders = [('Accept','application/json, text/javascript, */*; q=0.01'),('content-type','application/json'),
	('authority','hackerone.com'),('x-requested-with','XMLHttpRequest')]
	response = opener.open(hackerone,  timeout=60)
	json_string = response.read()
	return json.loads(json_string, 'utf-8')


hackerone_url = "https://hackerone.com/hacktivity?sort_type=latest_disclosable_activity_at&filter=type%3Apublic&page="
data = open_url(hackerone_url +str(1))


pages = data['pages']
total_reports = data['count']

print str(total_reports)  + " reports disclosed\n"


conn = MySQLdb.connect(host= "localhost",
                  user="root",
                  passwd="joaquin-1",
                  db="bounty_reasearch")
x = conn.cursor()

for i in range(1, pages):
	data = open_url (hackerone_url+str(i))	
	reports = data['reports']
	for report in reports:
		report_id = report['id']
		bounty_amount = "$0.0"
		title = report['title']

		if 'formatted_bounty' in report:
			bounty_amount = report['formatted_bounty']

		bounty_program = report['team']['handle']
		report_url = report['url']
		reporter = 'unknown'
		if 'reporter' in report:
			reporter = report['reporter']['username']

		try:	
			rep= open_url ("https://hackerone.com"+report_url+".json")	
			info = rep['vulnerability_information']
			info_html = rep['vulnerability_information_html']
			print "Report id: " + str(report_id) + ", url: " + report_url + ", title: " + title.encode('utf-8', 'replace') + ", bounty: " + bounty_amount + ", reporter: " + reporter.encode('utf-8', 'replace') 
			x.execute("""INSERT INTO reports VALUES (%s,%s,%s,%s,%s,%s,%s,%s)""",(str(report_id), report_url, title, reporter, bounty_amount, bounty_program, info, info_html))
			conn.commit()
		except Exception as exep:
			conn.rollback()			
			print "Problems with report: " + str(report_id) + ", skipping..."+". error: "+str(repr(exep.message))
			print "current page: "+str(i)			
			time.sleep(3)

conn.close()
#Parse the html in the 'page' variable, and store it in Beautiful Soup format
#soup = BeautifulSoup(opener, "html.parser")
#print soup.prettify() # prety response haha
#reports = soup.find_all("a","hacktivity__link")
