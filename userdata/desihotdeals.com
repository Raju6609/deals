--- 
customlog: 
  - 
    format: combined
    target: /usr/local/apache/domlogs/desihotdeals.com
  - 
    format: "\"%{%s}t %I .\\n%{%s}t %O .\""
    target: /usr/local/apache/domlogs/desihotdeals.com-bytes_log
documentroot: /home2/desideal/public_html
group: desideal
hascgi: 0
homedir: /home2/desideal
ip: 119.18.57.78
owner: root
phpopenbasedirprotect: 1
port: 80
scriptalias: 
  - 
    path: /home2/desideal/public_html/cgi-bin
    url: /cgi-bin/
serveradmin: webmaster@desihotdeals.com
serveralias: www.desihotdeals.com
servername: desihotdeals.com
usecanonicalname: 'Off'
user: desideal
