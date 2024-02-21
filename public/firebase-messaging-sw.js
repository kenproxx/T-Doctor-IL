importScripts('https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/10.8.0/firebase-messaging.js');

// Cấu hình Firebase
firebase.initializeApp({
    apiKey: "AIzaSyAW-1uaHUA8tAaA3IQD9ypNkbVzFji88bE",
    authDomain: "chat-firebase-de134.firebaseapp.com",
    projectId: "chat-firebase-de134",
    storageBucket: "chat-firebase-de134.appspot.com",
    messagingSenderId: "867778569957",
    appId: "1:867778569957:web:7f3a6b87d83cefd8e8d60c"
});

// firebase.initializeApp(firebaseConfig);

// Đối tượng messaging từ Firebase
const messaging = firebase.messaging();

// Xử lý sự kiện nhận thông báo
messaging.setBackgroundMessageHandler(function(payload) {
    console.log('Received background message: ', payload);

    // Customize notification here
    const notificationTitle = 'Background Message Title';
    const notificationOptions = {
        body: 'Background Message body.',
        icon: '/firebase-logo.png'
    };

    return self.registration.showNotification(notificationTitle, notificationOptions);
});

self.addEventListener('error', function (event) {
    console.error('Service Worker script error:', event.error);
});

