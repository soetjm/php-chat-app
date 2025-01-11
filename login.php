<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Chat</title>
    <style>
        @font-face {
            font-family: headFont;
            src: url('ui/fonts/Summer-Vibes-OTF.otf')
        }

        @font-face {
            font-family: myFont;
            src: url('ui/fonts/OpenSans-Regular.ttf')
        }

        #wrapper {
            max-width: 900px;
            min-height: 500px;
            /* display: flex; */
            margin: auto;
            color: gray;
            font-family: myFont;
            font-size: 13px;
        }

        form {
            margin: auto;
            /* background-color: black; */
            padding: 10px;
            width: 100%;
            max-width: 400px;
        }

        input[type=text],
        [type=password],
        input[type=submit],
        input[type=email] {
            padding: 10px;
            margin: 10px;
            width: 98%;
            border-radius: 5px;
            border: solid 1px gray;
        }

        input[type=submit] {
            width: 103%;
            cursor: pointer;
            background-color: #2b5488;
            color: white;
        }

        input[type=radio] {
            transform: scale(1.1);
            cursor: pointer;
        }

        #header {
            background-color: #485b6c;
            /* height: 70px; */
            font-size: 40px;
            text-align: center;
            font-family: headFont;
            width: 100%;
            color: white;
        }

        #error {
            text-align: center;
            padding: 0.5em;
            background-color: #ecaf91;
            color: #fff;
            max-width: 400px;
            margin: auto;
            display: none;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            My Chat
            <div style="font-size: 20px;">Login</div>
        </div>
        <div id="error">some text</div>
        <form action="" id="myform">
            <input type="email" name="email" id="" placeholder="email"><br>
            <input type="password" name="password" id="" placeholder="Password"><br>
            <!-- <input type="password" name="password2" id="" placeholder="Retype Password"><br> -->
            <input type="submit" value="Login" id="login_button">
            <br>
            <br>
            <a href="signup.php" style="display: block;text-align:center;">
                Dont have an account?? signup
            </a>
        </form>

    </div>
</body>
<script type="text/javascript">
    function _(element) {
        return document.getElementById(element)
    }

    var login_button = _("login_button");
    login_button.addEventListener("click", collect_data)

    function collect_data(e) {
        e.preventDefault
        login_button.disabled = true;
        login_button.value = "Loding...Please wait..";
        var myform = _("myform");
        var inputs = myform.getElementsByTagName("INPUT");
        var data = {};
        for (let i = inputs.length - 1; i >= 0; i--) {
            var key = inputs[i].name;

            switch (key) {
                case "email":
                    data.email = inputs[i].value;
                    break;
                case "password":
                    data.password = inputs[i].value;
                    break;
            }
        }
        send_data(data, "login")
    }

    function send_data(data, type) {
        var xml = new XMLHttpRequest

        xml.onload = function() {

            if (xml.readyState == 4 || xml.status == 200) {
                handle_result(xml.responseText);
                login_button.disabled = false;
                login_button.value = "Login";
            }
        }
        data.data_type = type;
        var data_string = JSON.stringify(data);
        xml.open("POST", "api.php", true);
        xml.send(data_string);
    }

    function handle_result(result) {
        var data = JSON.parse(result);

        if (data.data_type == 'info') {

            window.location = 'index.php'; //redirecting to the home page like express redirect
        } else {

            var error = _('error');
            error.innerHTML = data.message;
            error.style.display = 'block';
        }
    }
</script>

<!-- //part 12 is finesd next day part  -->

</html>