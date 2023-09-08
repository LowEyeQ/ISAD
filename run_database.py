import mysql.connector

# Define database connection parameters
config = {
    'user': 'root',
    'password': '0987654321',
    'host': 'localhost',  # e.g., 'localhost'
    'database': 'database isad',
}

# Establish a database connection
try:
    conn = mysql.connector.connect(**config)
    cursor = conn.cursor()

    # Execute SQL queries
    cursor.execute('SELECT * FROM employee')
    data = cursor.fetchall()

    # Print the retrieved data
    for row in data:
        print(row)

except mysql.connector.Error as err:
    print(f"Error: {err}")

finally:
    # Close the cursor and database connection
    cursor.close()
    conn.close()
