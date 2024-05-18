<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php
$jsonFormData = get_option('CONVERSIOS_COOKIE_DATA');

$decodedFormData = json_decode($jsonFormData, true);

if ($decodedFormData !== null) {
    $title = isset($decodedFormData['title']) ? $decodedFormData['title'] : '';
    $message = isset($decodedFormData['message']) ? $decodedFormData['message'] : '';
    $buttonlabel1 = isset($decodedFormData['buttonlabel1']) ? $decodedFormData['buttonlabel1'] : 'Accept';
    $buttonlabel2 = isset($decodedFormData['buttonlabel2']) ? $decodedFormData['buttonlabel2'] : 'Reject';
    $cookiename = isset($decodedFormData['cookiename']) ? $decodedFormData['cookiename'] : '';
    $cookievalue = isset($decodedFormData['cookievalue']) ? $decodedFormData['cookievalue'] : '';
    $cookieexpiration = isset($decodedFormData['cookieexpiration']) ? $decodedFormData['cookieexpiration'] : '';
} else {
    echo 'Error decoding form data from the options table.';
}
?>

<div class="cookie-consent" id="cookiebanner">
    <h6><b><?php echo $title; ?></b></h6>
    <span><?php echo $message; ?></span>
    <div class="buttons mt-2">
        <button class="allow-button mr-1" name="accept" onclick="acceptfunc()"><?php echo $buttonlabel1; ?></button>
        <button class="reject-button" name="reject" onclick="rejectfunc()"><?php echo $buttonlabel2; ?></button>
    </div>
</div>

<style>
.cookie-consent {
    position: fixed;
    bottom: 20px;
    left: 90px;
    width: 500px;
    padding: 10px 20px;
    height: auto;
    color: white;
    line-height: 20px;
    font-size: 16px;
    font-weight: regular;
    background: #202020;
    z-index: 200;
    cursor: pointer;
    border-radius: 13px;
    margin-bottom: 40px;
}

.cookie-consent h6 {
    font-size: 24px;
    font-weight: bold;
    color: white;
    margin-top: 20px;
    margin-bottom: 10px;
}

.buttons {
    margin-top: 25px;
    margin-bottom:10px;
    display: flex;
    justify-content: space-between;
}

.allow-button, .reject-button {
    height: 40px;
    font-size: 16px;
    border-radius: 3px;
    border: 1px solid black;
    color: white;
    cursor: pointer;
}

.allow-button {
    width: 240px;
    background-color: #1578f7;
}

.reject-button {
    width: 240px;
    background-color: #DD1111;
}

.allow-button:hover {
    background-color: #2e91ff;
}

.reject-button:hover {
    background-color: #ff4d4d !important;
}
</style>

<script>
    $(document).ready(function() {
        var cookieConsent = getCookie("<?php echo $cookiename; ?>");
        if (cookieConsent === "<?php echo $cookievalue; ?>") {
            $('#cookiebanner').hide();
        }
    });

    function acceptfunc() {
        $('#cookiebanner').hide();
        setCookie("<?php echo $cookiename; ?>", "<?php echo $cookievalue; ?>", <?php echo $cookieexpiration; ?>);
    }

    function rejectfunc() {
        $('#cookiebanner').hide();
    }

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function getCookie(name) {
        var cookieName = name + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var cookieArray = decodedCookie.split(';');
        for (var i = 0; i < cookieArray.length; i++) {
            var cookie = cookieArray[i];
            while (cookie.charAt(0) === ' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(cookieName) === 0) {
                return cookie.substring(cookieName.length, cookie.length);
            }
        }
        return null;
    }
</script>
