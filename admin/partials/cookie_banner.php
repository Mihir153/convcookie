<?php
include('navbar.php');
?>
</head>
<body>
<style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        #submit {
            background-color: #043E88;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        #submit:hover {
            background-color: #001E44;
        }

        .cookie-consent {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .cookie-consent h6 {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .allow-button {
            background-color: #043E88;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .allow-button:hover {
            background-color: #032e66;
        }
        
input::placeholder, textarea::placeholder {
    font-size: 14px; 
    color: #888; 
}

    </style>

    <div class="container">
        <div class="card">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3" placeholder="Enter message"></textarea>
            </div>

            <div class="form-group">
                <label for="buttonlabel1">Button Label 1</label>
                <input type="text" class="form-control" id="buttonlabel1" placeholder="Enter button label 1">
            </div>

            <div class="form-group">
                <label for="buttonlabel2">Button Label 2</label>
                <input type="text" class="form-control" id="buttonlabel2" placeholder="Enter button label 2">
            </div>

            <div class="form-group">
                <label for="cookielabel">Cookie name</label>
                <input type="text" class="form-control" id="cookiename" placeholder="Enter cookie name">
            </div>

            <div class="form-group">
                <label for="cookievalue">Cookie value</label>
                <input type="text" class="form-control" id="cookievalue" placeholder="Enter cookie value">
            </div>

            <div class="form-group">
                <label for="cookieexpiration">Cookie expiration</label>
                <input type="text" class="form-control" id="cookieexpiration" placeholder="Enter cookie expiration">
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Save Changes</button>
        </div>
        <div id="bannerPreview" class="mt-4 mb-4" style="display: none;">
                <div class="cookie-consent" style="position: relative;">
                    <h6><b>Title</b></h6><span>Message</span>
                    <div class="mt-2 d-flex align-items-center justify-content-center g-2">
                        <button class="allow-button mr-1">Button 1</button>
                        <button class="allow-button">Button 2</button>
                    </div>
                </div>
            </div>
    </div>
    <script>
        var ajax = "<?php echo esc_url_raw((admin_url('admin-ajax.php'))); ?>"

        jQuery(document).ready(function() {
            jQuery("#submit").click(function() {
                var formData = {
                    'title': jQuery("#title").val(),
                    'message': jQuery("#message").val(),
                    'buttonlabel1': jQuery("#buttonlabel1").val(),
                    'buttonlabel2': jQuery("#buttonlabel2").val(),
                    'cookiename': jQuery("#cookiename").val(),
                    'cookievalue': jQuery("#cookievalue").val(),
                    'cookieexpiration': jQuery("#cookieexpiration").val()
                };
                var serializedData = JSON.stringify(formData);

                jQuery.ajax({
                    type: "POST",
                    url: ajax,
                    data: {
                        action: 'process_ajax',
                        formData: serializedData
                    },
                    success: function(response) {
                        console.log('value sent successfully')
                        console.log(response);
                    }
                });
            });
        });
    </script>