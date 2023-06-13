<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" type="image/png" sizes="96x96" href="favicon-32x32.png" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
      integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
      crossorigin="anonymous"
    />
    <link href="website/css/style.css" rel="stylesheet" />

    <title> LOAN CALCULATOR</title>
    <style>
      /* Utilities */

* {
  margin: 0;
  padding: 0;
}

body {
  font-family: "Times New Roman", Times, serif;
}

.brand {
  color: red;
}

/* Navbar */

.navbar {
  border-bottom: 2px solid #333;
}

.bg-image {
  background: #333 url("../img/background.png") no-repeat center center/cover;
  height: 600px;
}

.line {
  border: 1px solid #ccc;
}

#loading,
#results {
  display: none;
}

.main {
  margin-top: 50px;
  margin-bottom: 90px;
}

/* Footer */

#main-footer {
  border-top: 2px solid #333;
  padding: 0.5rem;
  color: #333;
  background: #fff;
}

#main-footer a {
  color: #333;
}

      </style>
  </head>

  <body>
    <!-- TOP MENU -->
    <header>
		<nav class="navbar py-2">
			<a href="">
				<h1>
					<span class="white">Real Estate</span>
					<span class="red"></span>
					<span class="white"></span>
				</h1>
			</a>
			<ul class="m-0"style="font-size:20px">
				<li><a href="index.php" class="white active">Home</a></li>
				<li><a href="loan.php" class="white">Home Loan</a></li>
				<li><a href="options.php" class="white">Sell Property</a></li>
        <li><a href="interest.php" class="white">Interest Rates</a></li>
				<li><a href="logout.php" class="white">Log out</a></li>
			</ul>
		</nav>
	</header>
    

    <div class="bg-image">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <div class="card main">
              <div class="card-header">
                <h4 class="float-left">LOAN CALCULATOR</h4>
              </div>

              <div class="card-body text-center">
                <form id="loan-form">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                      <input
                        type="number"
                        class="form-control"
                        id="amount"
                        placeholder="Loan Amount"
                      />
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">%</span>
                      </div>
                      <input
                        type="number"
                        class="form-control"
                        id="interest"
                        placeholder="Interest"
                      />
                    </div>
                  </div>

                  <div class="form-group">
                    <input
                      type="number"
                      class="form-control"
                      id="years"
                      placeholder="Years To Repay"
                    />
                  </div>

                  <div class="form-group">
                    <input
                      type="submit"
                      value="Calculate"
                      class="btn btn-dark btn-block"
                    />
                  </div>
                </form>

                <div class="line"></div>

                <!-- LOADER -->
                <div id="loading">
                  <img src="images/loading1.gif" alt="Loading..." />
                </div>

                <!-- RESULTS -->
                <div class="pt-4" id="results">
                  <h5>Results</h5>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Monthly EMI:</span>
                      </div>
                      <input
                        type="number"
                        class="form-control"
                        id="monthly-payment"
                        disabled
                      />
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Total Payback:</span>
                      </div>
                      <input
                        type="number"
                        class="form-control"
                        id="total-payment"
                        disabled
                      />
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Total Interest:</span>
                      </div>
                      <input
                        type="number"
                        class="form-control"
                        id="total-interest"
                        disabled
                      />
                    </div>
                  </div>
                  <!-- END RESULTS -->
                </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <footer id="main-footer">
      <div class="container">
        <div class="text-center">
          <p>
            Made with ❤️ by Nirzar, Prabhakar,Ashish, Avishka, Chintan
            <span id="copyright">
              <script>
                document
                  .getElementById("copyright")
                  .appendChild(
                    document.createTextNode(new Date().getFullYear())
                  );
              </script> </span
            >.
          </p>

        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script>
// Listen for submit
document.getElementById("loan-form").addEventListener("submit", function(e) {
  // Hide results
  document.getElementById("results").style.display = "none";

  // Show loader
  document.getElementById("loading").style.display = "block";

  setTimeout(calculateResults, 2000);

  e.preventDefault();
});

// Calculate Results
function calculateResults() {
  console.log("Calculating...");
  // UI Vars
  const amount = document.getElementById("amount");
  const interest = document.getElementById("interest");
  const years = document.getElementById("years");
  const monthlyPayment = document.getElementById("monthly-payment");
  const totalPayment = document.getElementById("total-payment");
  const totalInterest = document.getElementById("total-interest");

  const principal = parseFloat(amount.value);
  const calculatedInterest = parseFloat(interest.value) / 100 / 12;
  const calculatedPayments = parseFloat(years.value) * 12;

  // Compute monthly payment
  const x = Math.pow(1 + calculatedInterest, calculatedPayments);
  const monthly = (principal * x * calculatedInterest) / (x - 1);

  if (isFinite(monthly)) {
    monthlyPayment.value = monthly.toFixed(2);
    totalPayment.value = (monthly * calculatedPayments).toFixed(2);
    totalInterest.value = (monthly * calculatedPayments - principal).toFixed(2);

    // Show results
    document.getElementById("results").style.display = "block";

    // Hide loader
    document.getElementById("loading").style.display = "none";
  } else {
    showError("Please check your numbers");
  }
}

// Show Error
function showError(error) {
  // Hide results
  document.getElementById("results").style.display = "none";

  // Hide loader
  document.getElementById("loading").style.display = "none";

  // Create a div
  const errorDiv = document.createElement("div");

  // Get elements
  const card = document.querySelector(".card");
  const heading = document.querySelector(".heading");

  // Add class
  errorDiv.className = "alert alert-danger";

  // Create text node and append to div
  errorDiv.appendChild(document.createTextNode(error));

  // Insert error above heading
  card.insertBefore(errorDiv, heading);

  // Clear error after 3 seconds
  setTimeout(clearError, 3000);
}

// Clear Error
function clearError() {
  document.querySelector(".alert").remove();
}

    </script>
  </body>
</html>
