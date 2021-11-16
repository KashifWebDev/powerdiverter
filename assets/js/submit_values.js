function turn_device_on_off(id, new_value){
    $.ajax({

        type:"POST",
        url:'ajax/submit_details.php',
        data:{
            command: 'device_status',
            id:id,
            power_status: new_value
        },
        success:function(responsedata){
            var device_online_status = "";
            var update_value = 0;
            var device_online_status_btn_class = "";
            var device_online_status_text = "";
            var device_online_status_text_class = "";
            if(new_value){
                device_online_status = "ONLINE";
                update_value = 0;
                device_online_status_btn_class = "danger";
                device_online_status_text = "Turn Off";
                device_online_status_text_class = "success";
            }
            else {
                device_online_status = "OFFLINE";
                update_value = 1;
                device_online_status_btn_class = "success";
                device_online_status_text = "Turn On";
                device_online_status_text_class = "danger";
            }
            var newHtml = '       <p class="font-weight-bold float-left">\n' +
                '        <span class="m-0 font-weight-bold text-primary h5"> Status: </span>\n' +
                '        <span class="text-'+device_online_status_text_class+'">'+device_online_status+'</span>\n' +
                '    </p>\n' +
                '    <a href="#" onclick="turn_device_on_off('+id+','+update_value+')"\n' +
                '       class="btn btn-'+device_online_status_btn_class+' btn-icon-split float-right">\n' +
                '            <span class="icon text-white-50">\n' +
                '                <i class="fas fa-power-off"></i>\n' +
                '            </span>\n' +
                '        <span class="text">'+device_online_status_text+'</span>\n' +
                '    </a>';
            document.getElementById("device_status_value").innerHTML = newHtml;

        }
    })

}

function set_poll_post_time(id){
    var myButton  = document.getElementById("update_poll_post");
    myButton.value = "Updating....."
    const a = document.getElementById('pole_time');
    const b = document.getElementById('post_time');
    var pole = a.options[a.selectedIndex].value;
    var post = b.options[b.selectedIndex].value;
    $.ajax({
        type:"POST",
        url:'ajax/submit_details.php',
        data:{
            command: 'pole_post_time',
            id:id,
            pole: pole,
            post: post
        },
        success:function(responsedata){
            // alert(responsedata);
            myButton.value = "Set Pole/Post Time";
        }
    })
}

function wireless_connection(id, new_value){
    $.ajax({

        type:"POST",
        url:'ajax/submit_details.php',
        data:{
            command: 'wireless_connection',
            id:id,
            method: new_value
        },
        success:function(responsedata){
            var wifi_class = "";
            var threeG_class = "";
            var fourG_class = "";
            var lora_class = "";
            if(new_value == "WiFi") {
                wifi_class = "card bg-danger text-white selected_danger";
                threeG_class = "card bg-secondary text-white";
                fourG_class = "card bg-success text-white";
                lora_class = "card bg-primary text-white";
            }
            if(new_value == "3G") {
                wifi_class = "card bg-danger text-white";
                threeG_class = "card bg-secondary text-white selected_secondary";
                fourG_class = "card bg-success text-white";
                lora_class = "card bg-primary text-white";
            }
            if(new_value == "4G") {
                wifi_class = "card bg-danger text-white";
                threeG_class = "card bg-secondary text-white";
                fourG_class = "card bg-success text-white selected_success";
                lora_class = "card bg-primary text-white";
            }
            if(new_value == "LORA") {
                wifi_class = "card bg-danger text-white";
                threeG_class = "card bg-secondary text-white";
                fourG_class = "card bg-success text-white";
                lora_class = "card bg-primary text-white selected_primary";
            }
            var newHtml = '<div class="row">\n' +
                '    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">\n' +
                '        <a href="#" onclick="wireless_connection('+id+', \'WiFi\')" class="text-white text-decoration-none">\n' +
                '            <div class="'+wifi_class+'">\n' +
                '                <div class="card-body p-2">\n' +
                '                    WiFi\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </a>\n' +
                '    </div>\n' +
                '    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">\n' +
                '        <a href="#" onclick="wireless_connection('+id+', \'3G\')" class="text-white text-decoration-none">\n' +
                '            <div class="'+threeG_class+'">\n' +
                '                <div class="card-body p-2">\n' +
                '                    3G\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </a>\n' +
                '    </div>\n' +
                '    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">\n' +
                '        <a href="#" onclick="wireless_connection('+id+', \'4G\')" class="text-white text-decoration-none">\n' +
                '            <div class="'+fourG_class+'">\n' +
                '                <div class="card-body p-2">\n' +
                '                    4G\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </a>\n' +
                '    </div>\n' +
                '    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mt-sm-2 mt-md-0 mt-lg-0 mt-xl-0">\n' +
                '        <a href="#" onclick="wireless_connection('+id+', \'LORA\')" class="text-white text-decoration-none">\n' +
                '            <div class="'+lora_class+'">\n' +
                '                <div class="card-body p-2">\n' +
                '                    LORA\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </a>\n' +
                '    </div>\n' +
                '</div>';
            if(responsedata){
                document.getElementById("communication_block").innerHTML = newHtml;
            }
        }
    })

}

function relay_operation(id, new_value){
    $.ajax({
        type:"POST",
        url:'ajax/submit_details.php',
        data:{
            command: 'relay',
            id:id,
            relay_status: new_value
        },
        success:function(responsedata){
            var on_class = "";
            var off_class = "";
            if(new_value == "ON") {
                on_class = "card bg-info text-white selected_info";
                off_class = "card bg-success text-white"
            }
            if(new_value == "OFF") {
                on_class = "card bg-info text-white";
                off_class = "card bg-success text-white selected_success"
            }
            var newHtml = '<div class="row">\n' +
                '    <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">\n' +
                '        <a href="#" onclick="relay_operation('+id+', \'OFF\')" class="text-white text-decoration-none">\n' +
                '            <div class="'+off_class+'">\n' +
                '                <div class="card-body p-2">\n' +
                '                    Off Peak\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </a>\n' +
                '    </div>\n' +
                '    <div class="col-sm-6 col-md-12 col-lg-6 cardbody-auto-width">\n' +
                '        <a href="#" onclick="relay_operation('+id+', \'ON\')" class="text-white text-decoration-none">\n' +
                '            <div class="'+on_class+'">\n' +
                '                <div class="card-body p-2">\n' +
                '                    Main\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </a>\n' +
                '    </div>\n' +
                '</div>';
            if(responsedata){
                // alert(responsedata);
                document.getElementById("relay_operation_block").innerHTML = newHtml;
            }
        }
    })

}

function update_dutycycle(id, new_value){
    // alert(id+'\n'+new_value);
    var myButton  = document.getElementById("update_dc_btn");
    myButton.value = "Updating....."
    document.getElementById('dutyCycleValue').innerText = new_value;
    $.ajax({
        type:"POST",
        url:'ajax/submit_details.php',
        data:{
            command: 'update_dc',
            id:id,
            new_dc: new_value
        },
        success:function(responsedata){
            // alert(responsedata);
            myButton.value = "Set";
        }
    })
}