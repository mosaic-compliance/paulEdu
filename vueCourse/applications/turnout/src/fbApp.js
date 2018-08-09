import firebase from 'firebase'


var config = {
    apiKey: "AIzaSyBXgzEAu2PMuvBC3kJgToTa4X-PD4qHDyo",
    authDomain: "turnout-df191.firebaseapp.com",
    databaseURL: "https://turnout-df191.firebaseio.com",
    projectId: "turnout-df191",
    storageBucket: "turnout-df191.appspot.com",
    messagingSenderId: "510125253795"
};

export const fbApp = firebase.initializeApp(config)
export const eventsRef =fbApp.database().ref().child('events')