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
            max-height: 630px;
            display: flex;
            margin: auto;
            color: white;
            font-family: myFont;
            font-size: 13px;
        }

        #left_pannel {
            min-height: 500px;
            background-color: #27344b;
            flex: 1;
            text-align: center;
            /* padding: 10px; */
        }

        #profile_image {
            width: 80%;
            border-radius: 50%;
            border: solid thin white;
            margin: 10px;
        }

        #left_pannel label {
            width: 100%;
            height: 20px;
            display: block;
            background-color: #404b56;
            border-bottom: solid thin #ffffff55;
            cursor: pointer;
            padding: 5px;
            transition: all 1s ease;
        }

        #left_pannel label:hover {
            background-color: #778593;
        }

        #left_pannel label img {
            float: right;
            width: 25px;
        }

        #right_pannel {
            min-height: 500px;
            /* background-color: green; */
            flex: 4;
            text-align: center;
        }

        #header {
            background-color: #485b6c;
            height: 70px;
            font-size: 40px;
            text-align: center;
            font-family: headFont;
            position: relative;
        }

        #inner_left_pannel {
            background-color: #383e48;
            flex: 1;
            min-height: 430px;
            max-height: 550px;
        }

        #inner_right_pannel {
            background-color: #f2f7f8;
            flex: 2;
            min-height: 430px;
            max-height: 550px;
            transition: all 2s ease;
        }

        #radio_contact:checked~#inner_right_pannel {
            flex: 0;
        }

        #radio_setting:checked~#inner_right_pannel {
            flex: 0;
        }

        #contact {
            width: 100px;
            height: 120px;
            margin: 10px;
            display: inline-block;
            vertical-align: top;
            /* overflow: hidden; */
        }

        #contact img {
            width: 100px;
            height: 100px;
        }

        #active_contact {
            /* width: 100px; */
            height: 90px;
            margin: 10px;
            border: solid thin #aaa;
            padding: 2px;
            background-color: #eee;
            color: #444;
        }

        #active_contact img {
            width: 70px;
            height: 70px;
            border-radius: 100px;
            float: left;
            margin: 10px;
        }

        #message_left {
            min-width: 60%;
            min-height: 70px;
            margin: 10px;
            padding: 2px;
            padding-right: 8px;
            background-color: #eee;
            color: #444;
            float: left;
            box-shadow: 0px 0px 10px #aaa;
            border-bottom-left-radius: 50%;
            position: relative;
        }

        #message_left img {
            width: 55px;
            height: 55px;
            border-radius: 100px;
            float: left;
            margin: 2px;
            border-radius: 50%;
            border: solid 2px white;
        }

        #message_left div {
            width: 20px;
            height: 20px;
            background-color: #34474f;
            border: solid 2px white;
            border-radius: 50%;
            position: absolute;
            left: -10px;
            top: 20px;
        }


        #message_right {
            min-width: 60%;
            /*width:60%;*/
            /* min-width: 200px; */
            min-height: 70px;
            margin: 10px;
            padding: 2px;
            padding-right: 8px;
            background-color: #FAFAFA;
            color: #444;
            float: right;
            box-shadow: 0px 0px 10px #aaa;
            border-bottom-right-radius: 50%;
            position: relative;
        }

        #message_right #prof_img,
        #prof_left {
            width: 55px;
            height: 55px;
            border-radius: 100px;
            float: left;
            margin: 2px;
            border-radius: 50%;
            border: solid 2px white;
        }

        #message_right div img {
            width: 30px;
            height: 20px;
            border-radius: 100px;
            float: none;
            margin: 0px;
            border-radius: 50%;
            border: none;
            position: absolute;
            top: 30px;
            right: 10px;
        }

        #message_right #trash {
            width: 20px;
            height: 20px;
            position: absolute;
            top: 15px;
            left: -10px;
            cursor: pointer;
        }

        #message_left #trash {
            width: 20px;
            height: 20px;
            position: absolute;
            top: 15px;
            right: -10px;
            cursor: pointer;
        }

        #message_right div {
            width: 20px;
            height: 20px;
            background-color: #34474f;
            border: solid 2px white;
            border-radius: 50%;
            position: absolute;
            right: -10px;
            top: 20px;
        }


        .loader_on {
            position: absolute;
            width: 30%;
        }

        .loader_off {
            display: none;
        }

        .image_on {
            position: absolute;
            width: 300px;
            height: 300px;
            top: 50px;
            left: 50px;
            z-index: 10;
            /* background-color: #FFFFFF; */
        }

        .iamge_off {
            display: none;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="left_pannel">
            <div id="user_info" style="padding: 10px;">
                <img id="profile_image" src="ui/images/male.jpg" alt="" srcset="" style="height:100px;width:100px;">
                <br>
                <span id="username">username</span>
                <br>
                <span id="email" style="font-size: 12px;opacity:0.5;">email@gmail.com</span>
                <br>
                <br>
                <br>
                <div>
                    <label id="label_chat" for="radio_chat">Chat <img src="ui/icons/chat.png" alt="" srcset=""></label>
                    <label id="label_contact" for="radio_contact">Contact <img src="ui/icons/contacts.png" alt="" srcset=""></label>
                    <label id="label_setting" for="radio_setting">Setting <img src="ui/icons/settings.png" alt="" srcset=""></label>
                    <label id="logout" for="radio_logout">Logout <img src="ui/icons/logout.png" alt="" srcset=""></label>
                </div>
            </div>

            <!-- <input type="button" value="Logout" id="logout"> -->

        </div>
        <div id="right_pannel">
            <div id="header">
                <div id="loader_hold" class="loader_on"><img style="width: 70px;" src="ui/icons/giphy.gif" alt="" srcset=""></div>

                <div id="image_vewer" class="image_off" onclick="close_image(event)">

                </div>
                My Chat
            </div>
            <div id="container" style="display: flex;">
                <div id="inner_left_pannel">

                </div>
                <input style="display: none;" type="radio" name="myradio" id="radio_chat">
                <input style="display: none;" type="radio" name="myradio" id="radio_contact">
                <input style="display: none;" type="radio" name="myradio" id="radio_setting">
                <div id="inner_right_pannel">
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    var send_audio = new Audio("message_sent.mp3");
    var receved_audio = new Audio("message_received.mp3");
    var CURRENT_CHAT_USER = "";
    var SEEN_STATUS = false;

    function _(element) {
        return document.getElementById(element)
    }

    var label_contact = _("label_contact");
    label_contact.addEventListener("click", get_contacts);

    var label_chat = _("label_chat");
    label_chat.addEventListener("click", get_chats);

    var label_setting = _("label_setting");
    label_setting.addEventListener("click", get_settings);

    var logout = _("logout");
    logout.addEventListener("click", logout_user);

    function get_data(find, type) {

        var xml = new XMLHttpRequest();
        var loader_holder = _("loader_hold");
        loader_holder.className = "loader_on";
        xml.onload = function() {

            if (xml.readyState == 4 || xml.status == 200) {
                // alert(xml.responseText);
                loader_holder.className = "loader_off";
                handel_result(xml.responseText, type);
            }

        }

        var data = {};
        data.find = find;
        data.data_type = type;
        data = JSON.stringify(data);
        xml.open("POST", "api.php", true);
        xml.send(data)
    }

    function handel_result(result, type) {
        // alert(result)
        if (result.trim() != "") {
            var inner_right_pannel = _("inner_right_pannel");
            inner_right_pannel.style.overflow = 'visible';
            var obj = JSON.parse(result);
            if (typeof(obj.logged_in) != "undefined" && !obj.logged_in) {
                window.location = 'login.php'; //remamber to change to login.php
            } else {
                // alert(result);
                switch (obj['data_type']) {
                    case "user_info":
                        var username = _("username");
                        var email = _("email");
                        var profile_image = _("profile_image");
                        username.innerHTML = obj['username'];
                        email.innerHTML = obj['email'];
                        profile_image.src = obj['image'];
                        break;
                    case 'contacts':

                        var inner_left_pannel = _("inner_left_pannel");
                        inner_right_pannel.style.overflow = 'hidden';
                        inner_left_pannel.innerHTML = obj['message'];
                        break;
                    case 'chats_refresh':
                        SEEN_STATUS = false;
                        var messages_holder = _("messages_holder");
                        messages_holder.innerHTML = obj['messages'];
                        if (typeof obj['new_message'] != 'undefined') {
                            if (obj['new_message']) {
                                receved_audio.play();
                                messages_holder.scrollTo(0, messages_holder.scrollHeight)
                            }
                        }
                        break;
                    case 'send_message':
                        send_audio.play();
                    case 'chats':
                        SEEN_STATUS = false;
                        var inner_left_pannel = _("inner_left_pannel");
                        inner_left_pannel.innerHTML = obj['user'];
                        inner_right_pannel.innerHTML = obj['messages'];

                        var messages_holder = _("messages_holder");
                        messages_holder.scrollTo(0, messages_holder.scrollHeight)
                        var message_text = _("message_text");
                        message_text.focus();
                        if (typeof obj['new_message'] != 'undefined') {
                            if (obj['new_message']) {
                                receved_audio.play();
                            }
                        }
                        break;
                    case 'settings':
                        var inner_left_pannel = _("inner_left_pannel");
                        inner_left_pannel.innerHTML = obj['message'];
                        break;
                    case 'send_image':
                        alert(obj['message']);
                        break;
                    case 'save_settings':
                        alert(obj['message']);
                        get_data({}, "user_info");
                        get_settings(true);
                        break;
                        // case 'send_message':
                        //     alert(obj['message']);
                        //     // get_data({}, "user_info");
                        //     // get_settings(true);
                        //     break;
                }
            }

        }
    }

    function logout_user() {
        var answer = confirm("Are you sure to log out");
        if (answer) {
            get_data({}, 'logout');
        }
    }

    get_data({}, "user_info");
    get_data({}, "contacts");

    var radio_contacts = _("radio_contact");
    radio_contacts.checked = true;

    function get_contacts(e) {
        get_data({}, "contacts")
    }

    function get_chats(e) {
        get_data({}, "chats")
        // alert("hi");
    }

    function get_settings(e) {
        get_data({}, "settings")
    }

    function send_message(e) {
        var message_text = _("message_text");
        if (message_text.value.trim() == "") {
            alert('please type something')
            return;
        }
        // alert(message_text.value);
        get_data({
            message: message_text.value.trim(),
            user_id: CURRENT_CHAT_USER
        }, "send_message")
    }

    function enter_pressed(e) {
        if (e.keyCode == 13) {
            send_message(e)
        }
        SEEN_STATUS = true;
    }
    setInterval(function() {
        var radio_chat = _("radio_chat");
        if (CURRENT_CHAT_USER != "" && radio_chat.checked) {
            get_data({
                userid: CURRENT_CHAT_USER,
                seen: SEEN_STATUS
            }, "chats_refresh")
        }
        // var radio_chat = _("radio_chat");
        // radio_chat.checked = true;
    }, 1000)

    function set_seen(e) {
        SEEN_STATUS = true;
    }

    function delete_message(e) {
        if (confirm("Are you sure you want to delete this message")) {
            var msgid = e.target.getAttribute("msgid")
            get_data({
                rowid: msgid
            }, "delete_message")

            get_data({
                userid: CURRENT_CHAT_USER,
                seen: SEEN_STATUS
            }, "chats_refresh")
        }
    }

    function delete_thread(e) {
        if (confirm("Are you sure you want to delete this whole thread??")) {
            get_data({
                userid: CURRENT_CHAT_USER,
            }, "delete_thread")

            get_data({
                userid: CURRENT_CHAT_USER,
                seen: SEEN_STATUS
            }, "chats_refresh")
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

<script type="text/javascript">
    // var signup_button = _("signup_button");
    // signup_button.addEventListener("click", collect_data);

    function collect_data() {
        var save_settings_button = _("save_settings_button");
        save_settings_button.disabled = true;
        save_settings_button.value = "Loding...Please wait..";
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
                case "gender":
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
        send_data(data, "save_settings")
    }

    function send_data(data, type) {
        var xml = new XMLHttpRequest

        xml.onload = function() {

            if (xml.readyState == 4 || xml.status == 200) {
                handel_result(xml.responseText, type);
                var save_settings_button = _("save_settings_button");
                save_settings_button.disabled = false;
                save_settings_button.value = "Sign up";
            }
        }
        data.data_type = type;
        var data_string = JSON.stringify(data);
        xml.open("POST", "api.php", true);
        xml.send(data_string);
    }

    function upload_profile_image(files) {
        // alert(files[0].name);
        var change_image_button = _("change_image_button");
        change_image_button.disabled = true;
        change_image_button.innerHTML = "Uploading Image.... ";

        var myForm = new FormData();

        var xml = new XMLHttpRequest

        xml.onload = function() {

            if (xml.readyState == 4 || xml.status == 200) {
                // alert(xml.responseText);
                get_data({}, "user_info");
                get_settings(true);
                //var change_image_button = _("change_image_button");
                change_image_button.disabled = false;
                change_image_button.innerHTML = "Change Image";
            }
        }
        myForm.append("file", files[0]);
        myForm.append("data_type", 'change_profile_image');
        xml.open("POST", "upload.php", true);
        xml.send(myForm);
    }

    function handel_drag_and_drop(e) {
        if (e.type == "dragover") {
            e.preventDefault();
            e.target.className = "dragging";
        } else if (e.type == "dragleave") {
            e.target.className = "";
        } else if (e.type == "drop") {
            e.preventDefault();
            e.target.className = "";
            upload_profile_image(e.dataTransfer.files)
        } else {
            e.target.className = "";
        }
    }

    function start_chat(e) {
        var userid = e.target.getAttribute('userid');
        if (e.target.id == "") {
            userid = e.target.parentNode.getAttribute('userid');
        }
        CURRENT_CHAT_USER = userid;
        var radio_chat = _("radio_chat");
        radio_chat.checked = true;
        get_data({
            userid: CURRENT_CHAT_USER
        }, "chats")
    }

    function send_image(files) {
        var file = files[0];
        var fileName = files[0].name
        var extIndex = fileName.lastIndexOf(".");
        var extName = fileName.substring(extIndex + 1).toUpperCase();
        if (extName != "JPG" || extName == "PNG") {
            alert('upload only jpg or png file')
            return
        };
        var myForm = new FormData();

        var xml = new XMLHttpRequest

        xml.onload = function() {

            if (xml.readyState == 4 || xml.status == 200) {
                handel_result(xml.responseText, "send_image");
                get_data({
                    userid: CURRENT_CHAT_USER,
                    seen: SEEN_STATUS
                }, "chats_refresh")
            }
        }
        myForm.append("file", files[0]);
        myForm.append("data_type", 'send_image');
        myForm.append("userid", CURRENT_CHAT_USER);
        xml.open("POST", "upload.php", true);
        xml.send(myForm);
    }

    function close_image(e) {
        e.target.className = 'iamge_off';
    }

    function image_show(e) {
        var image = e.target.src.split('uploades')[1];
        image[image.length - 1] = "";
        // alert(image);
        var image_viewer = _("image_vewer");
        image_viewer.innerHTML = `<img style="width:100%;height:100%;z-index:8;" src="uploades${image}"/>`
        image_viewer.className = 'image_on';
    }
</script>

<!-- // -->

</html>