<?php
include('navbar.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./frame-467.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto Flex:wght@300;400&display=swap"
    />
    <style>
      .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
        padding: 20px;
        max-width: 900px;
        margin: 0 auto;
        margin-top: 50px;
      }

      .welcome-to-conversios {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
      }

      .to-initiate-your {
        margin-bottom: 20px;
      }

      .status-banner-wrapper {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
      }

      .status-banner-inner {
        margin-bottom: 10px;
      }

      .info-card {
        flex: 1;
        border-radius: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.6);
        background-color: #043e88;
        padding: 20px;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-right: 20px;
      }

      .info-card:last-child {
        margin-right: 0;
      }

      .regulation-wrapper,
      .language-wrapper,
      .target-location-wrapper {
        display: flex;
        align-items: center;
      }

      .banner-status,
      .regulation,
      .language,
      .target-location {
        font-weight: bold;
        color: white;
      }

      .mdieye-icon {
        height: 30px;
        width: 30px;
        margin-left: 10px;
      }

      .active {
        color: #6FDD3C;
        font-weight: bold;
        letter-spacing:0.5px;
      }

      .dpdp-wrapper {
        display: flex;
        color: white;
        align-items: center;
      }

      .dpdp-wrapper .active {
        margin-right: 10px;
      }

      .english,
      .worldwide {
        color: white;
      }

      .banner-preview {
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        font-family: 'Roboto', sans-serif;
      }

      .banner-preview span {
        font-weight: bold;
        margin-right: 10px;
      }

      .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 26px;
      }

      .switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #A1A1A1;
        -webkit-transition: 0.4s;
        transition: 0.4s;
        border-radius: 30px;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 5.5px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: 0.4s;
        transition: 0.4s;
        border-radius: 50%;
      }

      input:checked + .slider {
        background-color: #63B100;
      }

      input:focus + .slider {
        box-shadow: 0 0 1px #63B100;
      }

      input:checked + .slider:before {
        -webkit-transform: translateX(21px);
        -ms-transform: translateX(21px);
        transform: translateX(21px);
      }

      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }

      .popup-container {
  display: none;
  position: absolute;
  top: 110%; /* Adjust this value to position it lower */
  left: 60%;
  transform: translate(-50%, -50%);
  background-color: #0c0c0c;
  border-radius: 12px;
  border: 1px solid rgba(209, 209, 209, 0.5);
  width: 442px;
  padding: 20px 19px;
}
        .popup-content {
        color: #fff;
        font-size: 16px;
      }

      .popup-buttons {
        display: flex;
        gap: 20px;
      }

      .popup-button {
        padding: 5px 52px;
        cursor: pointer;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        font-family: Roboto;
        text-align: center;
        min-width: 73px;
      }

      .blue-button {
        background-color: #1578f7;
        color: #fff;
      }

      .blue-button:hover {
        background-color: #2e91ff;
      }

      .red-button {
        background-color: #ef2727;
        color: #fff;
      }

      .red-button:hover {
        background-color: #ff4d4d;
      }
    </style>
  </head>
  <body>
    <div class="card">
      <div class="welcome-to-conversios">Welcome to Conversios!</div>
      <div class="to-initiate-your">
        To initiate your journey with Conversios Cookie plugin and to ensure
        legal compliance for cookie usage, please ensure the plugin is ‘Active’
      </div>

      <section class="status-banner-wrapper">
        <div class="info-card">
          <div class="status-banner-inner">
            <div class="frame-parent">
              <div class="regulation-wrapper">
                <div class="banner-status">Banner status:</div>
              </div>
              <div class="dpdp-wrapper">
                <div class="active">Active</div>
                <img
                  class="mdieye-icon"
                  alt=""
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAA7DAAAOwwHHb6hkAAABtklEQVR4nOyUyUoDQRCGE4M+gBMwcTlK1JuIByd61BD1JMSTy1NoJslNn8Dt6EMkoF6iCAk+hopB4y6oKAqx/Qv/IU0zIS4oHlLwwVBV/Vd1d/X4fA3796aUagGTYBFsEPmekNhPhNvBOrhRVXslrklsDYS/IhwAafAI3sAWmAEdoIl0glmwzZwH4MjaeuJhsM/uCqCf/iDIgByRBizGBkCRa/ZAqJZ4DzgGFZCUTumPgmsK3BKxK2AzR3aV4tojEDHF+8AleAJTmj9I8TMwpvljoMwiluZPgGdwIQ27TjnbU56jbRTOsNtRjx3HGEsZ/mFqlWRQfDy/F71DLTnHI/F7xPyMZWsUF82iXiD2CwUK7ryXuK2okZjmMXgVjzPmGP4R9THiJ8p9H/jo5cXIBSW0ZIsXWWZXfhKnTwajVcufpsa51yRFOGIVXm6AfptFxO6IovgQcwJcI4/uEHSbO3aLhMAuBQ7AoLYTmfMscdzOJYe5YnnQ5imuFZFukrwTsR0wB7pU9Vch3/OMid2DBcXH+SnjblZV9RWLmT87ia3U7bpOIfldj4NlsEmW6Gv+tnDD/szeAQAA//87+mCmAAAABklEQVQDACeYIKlCCSpPAAAAAElFTkSuQmCC"
                />
              </div>
            </div>
          </div>
        </div>

        <div class="info-card">
          <div class="status-banner-inner">
            <div class="frame-parent">
              <div class="regulation-wrapper">
                <div class="regulation">Regulation:</div>
              </div>
              <div class="dpdp-wrapper">
                <div class="dpdp">DPDP</div>
              </div>
            </div>
          </div>
        </div>

        <div class="info-card">
          <div class="status-banner-child">
            <div class="frame-group">
              <div class="language-wrapper">
                <div class="language">Language:</div>
              </div>
              <div class="english-wrapper">
                <div class="english">English</div>
              </div>
            </div>
          </div>
        </div>

        <div class="info-card">
          <div class="frame-div">
            <div class="frame-container">
              <div class="target-location-wrapper">
                <div class="target-location">Target Location:</div>
              </div>
              <div class="worldwide-wrapper">
                <div class="worldwide">Worldwide</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="banner-preview">
        <span>Banner Preview</span>
        <label class="switch">
          <input type="checkbox" id="toggleSwitch">
          <span class="slider round"></span>
        </label>
      </div>
    </div>
    <div class="popup-container">
      <div class="popup-content">
        <b>Your Privacy, Our Concern</b>
        <p>We use cookies to improve your browsing experience, serve personalized ads or content, and analyze our traffic. By clicking “Accept All”, you consent to our use of cookies.</p>
      </div>
      <div class="popup-buttons">
        <button class="popup-button blue-button">Accept All</button>
        <button class="popup-button red-button">Reject All</button>
      </div>
    </div>
    <script>
      document.getElementById('toggleSwitch').addEventListener('change', function() {
        var popupBox = document.querySelector('.popup-container');
        if (this.checked) {
          popupBox.style.display = 'block';
        } else {
          popupBox.style.display = 'none';
        }
      });
    </script>
  </body>
</html>
