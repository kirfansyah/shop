from flask import Flask, request, jsonify
from flask_cors import CORS
import pandas as pd
from sklearn.linear_model import LinearRegression
import numpy as np

app = Flask(__name__)
CORS(app)  # Aktifkan CORS untuk semua route

# Load historical data
data = pd.read_csv('historical.csv')
X = data[['distance']].values  # Features: distance
y = data['time'].values  # Target: time

# Train the linear regression model
model = LinearRegression()
model.fit(X, y)


# Function to predict delivery time based on distance
def predict_time(distance):
    distance = np.array([[distance]])  # Convert to 2D array for prediction
    predicted_time = model.predict(distance)
    return predicted_time[0]  # Return the predicted time


# API endpoint to get estimated time based on the distance
@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    distance = data.get('distance', 0)  # Get distance from request
    estimated_time = predict_time(distance)
    hours = int(estimated_time)
    minutes = int((estimated_time - hours) * 60)
    return jsonify({
        'estimated_time': f'{hours}h {minutes}m',
        'hours': hours,
        'minutes': minutes
    })


if __name__ == '__main__':
    app.run(debug=True)
