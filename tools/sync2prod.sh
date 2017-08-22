rsync -avz --exclude-from=conf/exclude-prod.txt -e "ssh -l webuser" /home/kana/kanadigital/preview/creasi/ 103.23.21.71:/home/webuser/staging 
