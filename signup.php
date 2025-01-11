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
        input[type=button],
        input[type=email] {
            padding: 10px;
            margin: 10px;
            width: 98%;
            border-radius: 5px;
            border: solid 1px gray;
        }

        input[type=button] {
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
            <div style="font-size: 20px;">Sign up</div>
        </div>
        <div id="error">some text</div>
        <form action="" id="myform">
            <input type="text" name="username" id="" placeholder="username"><br>
            <input type="email" name="email" id="" placeholder="email"><br>
            <div style="padding: 10px;">
                Gender:<br>
                <input type="radio" value="Male" name="gender_male" id="">Male<br>
                <input type="radio" value="Female" name="gender_female" id="">Female<br>
            </div>
            <input type="password" name="password" id="" placeholder="Password"><br>
            <input type="password" name="password2" id="" placeholder="Retype Password"><br>
            <!-- <input type="password" name="password2" id="" placeholder="Retype Password"><br> -->
            <input type="button" value="Sign Up" id="signup_button">
            <br>
            <br>
            <a href="login.php" style="display: block;text-align:center;">
                Already have an account?? Login hear
            </a>
        </form>

    </div>
</body>
<script type="text/javascript">
    function _(element) {
        return document.getElementById(element)
    }

    var signup_button = _("signup_button");
    signup_button.addEventListener("click", collect_data)

    function collect_data() {
        signup_button.disabled = true;
        signup_button.value = "Loding...Please wait..";
        var myform = _("myform");
        var inputs = myform.getElementsByTagName("INPUT");
        var data = {};
        for (let i = inputs.length - 1; i >= 0; i--) {
            var key = inputs[i].name;

            switch (key) {

                case "username":
                    data.username = inputs[i].value;
                    break;
                case "email":
                    data.email = inputs[i].value;
                    break;
                case "gender_male":
                case "gender_female":
                    if (inputs[i].checked) {
                        data.gender = inputs[i].value;
                    }
                    break;
                case "password":
                    data.password = inputs[i].value;
                    break;
                case "password2":
                    data.password2 = inputs[i].value;
                    break;
            }
        }
        send_data(data, "signup")
    }

    function send_data(data, type) {
        var xml = new XMLHttpRequest

        xml.onload = function() {

            if (xml.readyState == 4 || xml.status == 200) {
                handle_result(xml.responseText);
                signup_button.disabled = false;
                signup_button.value = "Sign up";
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

    // var label=_('label_chat');
    // label.addEventListener("click",function(){
    //     var inner_pannel=_("inner_left_pannel");
    //     var ajax=new XMLHttpRequest();
    //     ajax.onload=function(){
    //         if(ajax.status==200 || ajax.readyState == 4){
    //             inner_pannel.innerHTML=ajax.responseText
    //         }
    //     }
    //     ajax.open("POST","file.php",true);
    //     ajax.send()
    // })
</script>

<!-- //part 12 is finesd next day part  -->

</html>