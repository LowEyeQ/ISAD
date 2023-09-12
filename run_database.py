from flask import Flask, render_template
from flask_mysqldb import MySQL
from config import DATABASE_CONFIG

app = Flask(__name__)

# ใช้ข้อมูลการเชื่อมต่อ MySQL จาก config.py
app.config['MYSQL_HOST'] = DATABASE_CONFIG['host']
app.config['MYSQL_USER'] = DATABASE_CONFIG['user']
app.config['MYSQL_PASSWORD'] = DATABASE_CONFIG['password']
app.config['MYSQL_DB'] = DATABASE_CONFIG['database']

mysql = MySQL(app)

@app.route('/')
def index():
    cur = mysql.connection.cursor()
    cur.execute("SELECT  * FROM employee")  # เปลี่ยน your_table เป็นชื่อตารางของคุณ
    data = cur.fetchall()
    cur.close()
    return render_template('index.html', data=data)

if __name__ == '__main__':
    app.run(debug=True)
