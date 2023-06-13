from flask import Flask, request, jsonify
import util1

app = Flask(__name__)


@app.route('/get_location_names1', methods=['GET'])
def get_location_names1():
    response = jsonify({
        'locations': util1.get_location_names1()  # Populate locations to the frontend
    })
    response.headers.add('Access-Control-Allow-Origin', '*')

    return response


@app.route('/predict_home_price', methods=['GET', 'POST'])
def predict_home_price1():
    total_sqft = float(request.form['total_sqft'])
    location = request.form['location']
    bhk = int(request.form['bhk'])
    bath = int(request.form['bath'])

    response = jsonify({
        # populate the estimated price to the frontend
        'estimated_price': util1.get_estimated_price1(location, total_sqft, bhk, bath)
    })
    response.headers.add('Access-Control-Allow-Origin', '*')

    return response


if __name__ == "__main__":
    print("Starting Python Flask Server For Home Price Prediction...")
    util1.load_saved_artifacts1()
    app.run()
