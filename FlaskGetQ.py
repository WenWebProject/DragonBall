from flask import Flask, jsonify
import mysql.connector

app = Flask(__name__)

def get_random_question():
    conn = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="test"
    )
    cursor = conn.cursor()
    cursor.execute("SELECT Question FROM matheqa ORDER BY RAND() LIMIT 1")
    question = cursor.fetchone()
    conn.close()
    return question[0] if question else None

@app.route('/random-question', methods=['GET'])
def random_question():
    question = get_random_question()
    return jsonify({'question': question})

if __name__ == '__main__':
    app.run(debug=True)
    