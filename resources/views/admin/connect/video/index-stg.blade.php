@extends('layouts.admin')
@section('title', 'News Events')
@section('main-content')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.20.0/dist/axios.min.js"></script>
    <script src="https://cdn.stringee.com/sdk/web/2.2.1/stringee-web-sdk.min.js"></script>

    <style>
        [v-cloak] { display: none; }

        .header-highlight {
            color: #ff4954;
        }

        .info {
            padding: 1.5rem;
        }

        .container {
            padding-top: 1rem;
        }

        #videos {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        #videos video {
            flex: 1 1 50%;
            padding: 0;
            min-width: 0;
        }
    </style>
    <body>
    <div class="container has-text-centered" v-cloak id="app">
        <h1 class="title">
            Ứng dụng Clone Zoom cực cool ngầu với
            <span class="header-highlight">Stringee API</span>
        </h1>

        <div>
            <button class="button is-primary" v-if="!room" @click="createRoom">
                Tạo Meeting
            </button>

            <button class="button is-info" v-if="!room" @click="joinWithId">
                Join Meeting
            </button>

            <button class="button is-info" v-if="room" @click="publish(true)">
                Share Desktop
            </button>
        </div>

        <div v-if="roomId" class="info">
            <p>Bạn đang ở trong room <strong>{roomId}</strong>.</p>
            <p>
                Gửi link này cho bạn bè cùng join room nhé
                <a v-bind:href="roomUrl" target="_blank">{roomUrl}</a>.
            </p>
            <p>Hoặc bạn cũng có thể copy <code>{roomId}</code> để share.</p>
        </div>
    </div>

    <div class="container">
        <div id="videos"></div>
    </div>
    </body>


    <script>



        const PROJECT_ID = "SKIuNgIgQclWM0GFSPCJO7eervWS7hKkQg";
        const PROJECT_SECRET = "Tk1NaUZGVElWZ3VpNFZVQlZVVTZseWFsWTlHTndyMw==";
        const BASE_URL = "https://api.stringee.com/v1/room2";

        class API {
            constructor(projectId, projectSecret) {
                this.projectId = projectId;
                this.projectSecret = projectSecret;
                this.restToken = "";
            }

            async createRoom() {
                const roomName = Math.random().toFixed(4);
                console.log(this._authHeader())
                const response = await axios.post(
                    `${BASE_URL}/create`,
                    {
                        name: roomName,
                        uniqueName: roomName
                    },
                    {
                        headers: this._authHeader()
                    }
                );

                const room = response.data;
                console.log({ room });
                return room;
            }

            async listRoom() {
                const response = await axios.get(`${BASE_URL}/list`, {
                    headers: this._authHeader()
                });

                const rooms = response.data.list;
                console.log({ rooms });
                return rooms;
            }

            async deleteRoom(roomId) {
                const response = await axios.put(`${BASE_URL}/delete`, {
                    roomId
                }, {
                    headers: this._authHeader()
                })

                console.log({response})

                return response.data;
            }

            async clearAllRooms() {
                const rooms = await this.listRoom()
                const response = await Promise.all(rooms.map(room => this.deleteRoom(room.roomId)))

                return response;
            }

            async setRestToken() {
                const tokens = await this._getToken({ rest: true });
                const restToken = tokens.rest_access_token;
                this.restToken = restToken;

                return restToken;
            }

            async getUserToken(userId) {
                const tokens = await this._getToken({ userId });
                return tokens.access_token;
            }

            async getRoomToken(roomId) {
                const tokens = await this._getToken({ roomId });
                return tokens.room_token;
            }

            async _getToken({ userId, roomId, rest }) {
                const response = await axios.get(
                    "https://v2.stringee.com/web-sdk-conference-samples/php/token_helper.php",
                    {
                        params: {
                            keySid: this.projectId,
                            keySecret: this.projectSecret,
                            userId,
                            roomId,
                            rest
                        }
                    }
                );

                const tokens = response.data;
                console.log({ tokens });
                return tokens;
            }

            isSafari() {
                const ua = navigator.userAgent.toLowerCase();
                return !ua.includes('chrome') && ua.includes('safari');
            }

            _authHeader() {
                return {
                    "X-STRINGEE-AUTH": this.restToken
                };
            }
        }

        const api = new API(PROJECT_ID, PROJECT_SECRET);

        const videoContainer = document.querySelector("#videos");

        const vm = new Vue({
            el: "#app",
            data: {
                userToken: "",
                roomId: "",
                roomToken: "",
                room: undefined,
                callClient: undefined
            },
            computed: {
                roomUrl: function() {
                    return `https://${location.hostname}?room=${this.roomId}`;
                }
            },
            async mounted() {
                api.setRestToken();

                const urlParams = new URLSearchParams(location.search);
                const roomId = urlParams.get("room");
                if (roomId) {
                    this.roomId = roomId;

                    await this.join();
                }
            },
            methods: {
                authen: function() {
                    return new Promise(async resolve => {
                        const userId = `${(Math.random() * 100000).toFixed(6)}`;
                        const userToken = await api.getUserToken(userId);
                        this.userToken = userToken;

                        if (!this.callClient) {
                            const client = new StringeeClient();

                            client.on("authen", function(res) {
                                console.log("on authen: ", res);
                                resolve(res);
                            });
                            this.callClient = client;
                        }
                        this.callClient.connect(userToken);
                    });
                },
                publish: async function(screenSharing = false) {
                    const localTrack = await StringeeVideo.createLocalVideoTrack(
                        this.callClient,
                        {
                            audio: true,
                            video: true,
                            screen: screenSharing,
                            videoDimensions: { width: 640, height: 360 }
                        }
                    );

                    const videoElement = localTrack.attach();
                    this.addVideo(videoElement);

                    const roomData = await StringeeVideo.joinRoom(
                        this.callClient,
                        this.roomToken
                    );
                    const room = roomData.room;
                    console.log({ roomData, room });

                    if (!this.room) {
                        this.room = room;
                        room.clearAllOnMethos();
                        room.on("addtrack", e => {
                            const track = e.info.track;

                            console.log("addtrack", track);
                            if (track.serverId === localTrack.serverId) {
                                console.log("local");
                                return;
                            }
                            this.subscribe(track);
                        });
                        room.on("removetrack", e => {
                            const track = e.track;
                            if (!track) {
                                return;
                            }

                            const mediaElements = track.detach();
                            mediaElements.forEach(element => element.remove());
                        });

                        // Join existing tracks
                        roomData.listTracksInfo.forEach(info => this.subscribe(info));
                    }

                    await room.publish(localTrack);
                    console.log("room publish successful");
                },
                createRoom: async function() {
                    const room = await api.createRoom();
                    const { roomId } = room;
                    const roomToken = await api.getRoomToken(roomId);

                    this.roomId = roomId;
                    this.roomToken = roomToken;
                    console.log({ roomId, roomToken });

                    await this.authen();
                    await this.publish();
                },
                join: async function() {
                    const roomToken = await api.getRoomToken(this.roomId);
                    this.roomToken = roomToken;

                    await this.authen();
                    await this.publish();
                },
                joinWithId: async function() {
                    const roomId = prompt("Dán Room ID vào đây nhé!");
                    if (roomId) {
                        this.roomId = roomId;
                        await this.join();
                    }
                },
                subscribe: async function(trackInfo) {
                    const track = await this.room.subscribe(trackInfo.serverId);
                    track.on("ready", () => {
                        const videoElement = track.attach();
                        this.addVideo(videoElement);
                    });
                },
                addVideo: function(video) {
                    video.setAttribute("controls", "true");
                    video.setAttribute("playsinline", "true");
                    videoContainer.appendChild(video);
                }
            }
        });
    </script>
@endsection
