var firebaseConfig = {
    apiKey: "AIzaSyAKEHtirHgprgYwfJ-Pyem1IKypjY7okFc",
    authDomain: "banan-275706.firebaseapp.com",
    databaseURL: "https://banan-275706.firebaseio.com",
    projectId: "banan-275706",
    storageBucket: "banan-275706.appspot.com",
    messagingSenderId: "480698295473",
    appId: "1:480698295473:web:b6e3e18d26da14d8e9ee90",
    measurementId: "G-HMTVCXJ0VW"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();
messaging.requestPermission().then(function () {

    //console.log("Have Permission 1");
    return messaging.getToken();
})

.then(function (token) {

    // console.log(token);

    $.ajax({
        url: "/dashboard/token-refresh",
        data: { fcm_token : token },
        dataType : "JSON" ,
        type: 'POST',
        success: function(data) {

            if (data.error === true)
            {
                console.log( 1 , data);
            }


        },
        error:function(data)
        {
            console.log(2 ,data);
        }
    });

})
.catch(function (err) {
    console.log('not permitted', err);
});





messaging.onMessage(function(payload){
   console.log('init onMessage ' )
    let message = $.parseJSON(JSON.stringify(payload)).data

    if(message.status === "IN-PROCESS")
    {
        let notification = new Notification('سفارش جدید', {
            body: 'یک سفارش جدید در اپ بانان دارید' ,
            icon: message.icon
        });

        notification.onclick = function (e) {
            window.open(message.click_action);
            notification.close();
        };
    }

    if (typeof orderReceive === "function")
    {
        orderReceive(message.orderNumber , message.status, message.url)
    }


});




/*

navigator.serviceWorker.addEventListener('message', function(msg) {
    console.log('init serviceWorker ' )
    let message = msg.data.firebaseMessaging.payload.data;

    if (message.status == 'IN-PROCESS')
    {
        if (typeof orderReceive === "function")
        {
            orderReceive(message.orderNumber , message.status, message.url)
        }
    }


});
*/




