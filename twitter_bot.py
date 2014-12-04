#!/usr/bin/env python
# -*- coding: utf-8 -*-
 
import tweepy, time, sys
 
argfile = str(sys.argv[1])
 
#enter the corresponding information from your Twitter application:
CONSUMER_KEY = 'Ru6ucQXdi8Kr9MYzGgIz56n87'#keep the quotes, replace this with your consumer key
CONSUMER_SECRET = '4jtyeJb9Lc8oj5xTbyb8u2X361l3ZbRPrCokksYMJVWjm25nTo'#keep the quotes, replace this with your consumer secret key
ACCESS_KEY = '1086420055-LXc5AXhslGY3pLRR2HSKqFkeACvFs5SINdonzJq'#keep the quotes, replace this with your access token
ACCESS_SECRET = 'BrqKBnWDWUhqRMBq5vTKJZ5kkRfGHFmgHTT82VgpGJ0ye'#keep the quotes, replace this with your access token secret
auth = tweepy.OAuthHandler(CONSUMER_KEY, CONSUMER_SECRET)
auth.set_access_token(ACCESS_KEY, ACCESS_SECRET)
api = tweepy.API(auth)
 
filename=open(argfile,'r')
f=filename.readlines()
filename.close()
 
for line in f:
    api.update_status(line)
    time.sleep(900) #Tweet every 15 minutes