from flask import Flask, render_template
import mysql.connector
from config import DATABASE_CONFIG

app = Flask(__name__)

# Use the database configuration from config.py
db_config = DATABASE_CONFIG

@app.route('/')
def index():
    try:
        # Create a MySQL database connection
        conn = mysql.connector.connect(**db_config)
        if conn.is_connected():
            print("Connected to MySQL database")

            # Perform a SELECT query
            cursor = conn.cursor()
            cursor.execute("SELECT * FROM Employees")  # Replace 'your_table' with your actual table name
            data = cursor.fetchall()
            cursor.close()

            return render_template('index.html', data=data)
        else:
            return "Unable to connect to MySQL database"

    except mysql.connector.Error as err:
        return f"Error: {err}"

    finally:
        conn.close()

if __name__ == '__main__':
    app.run(debug=True)
