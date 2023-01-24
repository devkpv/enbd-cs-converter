# ENBD Credit Statements converter
Simple ENBD Bank converter credit statements from .xls to .csv

# How to use
Clone repository
```
git clone git@github.com:SpiLLeR/endb-cs-to-csv.git
```
Download ENBD Bank credit statements .xls from online banking and put it into folder with code

Run command
```
cat Credit_Statements.xls | docker container run --rm -i -v $(pwd):/app/ php:8.0-cli php /app/src/app.php | > Credit_Statements.csv
```
Credit_Statement.xls is name of file which download from online banking
Credit_Statements.csv is name of file which will be contained csv data

Profit!  
Example, I import .csv data to google sheets for budgeting