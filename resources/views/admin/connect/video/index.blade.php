@extends('layouts.admin')
@section('title', 'News Events')
@section('main-content')

    <div id="metered-frame"></div>

    <script src="https://cdn.metered.ca/sdk/frame/1.4.3/sdk-frame.min.js"></script>

    <body>
    <script src="https://cdn.metered.ca/sdk/video/1.4.6/sdk.min.js"></script>
    <h1>Hello world</h1>

    LocalVideo:
    <video id="localvideo" autoplay ></video>

    <button onclick="joinMeeting()">Join Meeting</button>

    Remote Video:
    <video id="remoteVideo" autoplay ></video>
    </body>




    <script>


        async function joinMeeting(){

            const meeting = new Metered.Meeting();
            const meetingInfo = await meeting.join({
                roomURL: "aliasgher.metered.live/ffpyr0hc5c",
                name: "John Doe"
            });
            console.log("Meeting joined", meetingInfo);

            try {
                meeting.startVideo();
            } catch (ex) {
                console.log("Error occurred when sharing camera", ex);
                alert('share camera not working')
            }

            meeting.on("localTrackStarted", function(item) {
                if (item.type === "video") {
                    /**
                     * localTrackStarted event emits a MediaStreamTrack
                     * but we cannot assign MediaStreamTrack into the html video tag
                     * hence we are creating MediaStream object, a MediaStream
                     * can be assigned to the html video tag.
                     */
                    var track = item.track;
                    var mediaStream = new MediaStream([track]);
                    /**
                     * We have a video tag on the page with id
                     * localvideo
                     * e.g: <video id="localvideo" autoplay muted></video>
                     * This video tag will show the user their own video
                     */
                    document.getElementById("localvideo").srcObject = mediaStream;
                    document.getElementById("localvideo").play();
                }
            });

            /**
             * participantInfo = {
             *       isAdmin: false
             *       meetingSessionId: "60fef02300f4a23904ab4861"
             *       name: "John Doe"
             *       roomId: "60fc7bcb1dc8562d6e4ab7b3"
             *       _id: "60fef02300f4a23904ab4862"
             *  }
             */
            meeting.on("participantJoined", function(participantInfo) {
                console.log("participant has joined the room", participantInfo);
            });



            /**
             * remoteTrackItem = {
             *   streamId: "eaa6104b-390a-4b0a-b8d1-66f7d19f8c1a",
             *   type: "video"
             *   participantSessionId: "60fef02300f4a23904ab4862"
             *   track: MediaStreamTrack,
             *   name: "Jane Smith"
             * }
             */
            meeting.on("remoteTrackStarted", function(remoteTrackItem) {
                console.log("remoteTrackStarted", remoteTrackItem);
                // Converting MediaStreamTrack to MediaStream
                var remoteTrack = remoteTrackItem.track;
                var remoteStream = new MediaStream([remoteTrack]);

                document.getElementById("remoteVideo").srcObject = remoteStream;
                document.getElementById("remoteVideo").play();
            });
        }


        // use localhost to run the video on your local server.  do not use the http ip address given by http-server because the metered video application needs https to run

    </script>
@endsection
