import $ from "jquery";
import { CallAnswer, CallOffer } from "../Users";
let config = {
    iceServers: [
      {
        urls: 'stun:stun1.l.google.com:19302'
      }
    ]
  };
// config
const user = JSON.parse(localStorage.getItem("user"));
const TimeListen = 15000;
// thực hiện cuộc gọi
export function Calling(from, to) {
    const data = {
        CallFrom: from,
        CallTo: to,
        OfferSDP: null,
        Avatar: user.avatar,
    };
    createOffer(data);
}
// setup var cho RTC
let peerConnection = new RTCPeerConnection(config);
let localStream;
let remoteStream;

// khởi tạo cuộc gọi
let init = async () => {
    localStream = await navigator.mediaDevices.getUserMedia({
        audio: true,
        video: true
    });
    remoteStream = new MediaStream()

    document.getElementById("CallFrom").srcObject = localStream;
    document.getElementById('CallTo').srcObject = remoteStream

    localStream.getTracks().forEach((track) => {
        peerConnection.addTrack(track, localStream);
        console.log(track);
    });

    peerConnection.ontrack = (event) => {
        event.streams[0].getTracks().forEach((track) => {
        remoteStream.addTrack(track);
        console.log(track);
        });
    };
};
// tạo và gửi lời mời vào cuộc gọi
let createOffer = async (data) => {
    peerConnection.onicecandidate = async (event) => {
        //Event that fires off when a new offer ICE candidate is created
        if(event.candidate){
            console.log(peerConnection.localDescription);
        }
    };
    
    const offer = await peerConnection.createOffer();
    
    console.log(offer);

    // await peerConnection.setLocalDescription(offer);
    // data.OfferSDP = JSON.stringify(offer);
    // console.log(offer);
    // CallOffer(data).then(function (res) {
    //     window.open(
    //         "/call?call_from=" + data.CallFrom + "&call_to=" + data.CallTo,
    //         "_blank"
    //     );
    // });
};
// tạo và gửi câu trả lời
let createAnswer = async (CallOffer) => {
    peerConnection.onicecandidate = async (event) => {
        //Event that fires off when a new offer ICE candidate is created
        if(event.candidate){
            console.log(peerConnection.localDescription);
        }
    };
    let offer = JSON.parse(CallOffer.OfferSDP);
    await peerConnection.setRemoteDescription(offer);

    let answer = await peerConnection.createAnswer();
    await peerConnection.setLocalDescription(answer);
    console.log(answer);
    const data = {
        CallFrom: user.id,
        CallTo: CallOffer.CallFrom,
        AnswerSDP: JSON.stringify(answer),
        Avatar: user.avatar,
    };
    CallAnswer(data).then(function (res) {
        console.log(data);
    });
};


let CompleteCalling = async (CallAnswer) =>{
    // console.log(CallAnswer);
    let answer = JSON.parse(CallAnswer.AnswerSDP);
    console.log(answer);
    if(!peerConnection.currentRemoteDescription){
        peerConnection.setRemoteDescription(answer)
    }
}

if (location.href.search("call") != -1) {
    init();
}

if (user) {
    // lắng nghe cuộc gọi tới
    window.Echo.channel("BeehiveCallOffer" + user.id).listen(
        "BeehiveCallOffer",
        function (CallOffer) {
            $("#calling img").attr("src", CallOffer.Avatar);
            $("#calling").addClass("show");

            $("#calling .no").click(function () {
                $("#calling").removeClass("show");
            });

            $("#calling .yes").click(function () {
                createAnswer(CallOffer);
                window.open(
                    "/call?call_from=" +
                        CallOffer.CallFrom +
                        "&call_to=" +
                        CallOffer.CallTo,
                    "_blank"
                );
            });

            // setTimeout(function(){
            // },5000)
        }
    );
    // lắng nghe câu trả lời
    window.Echo.channel("BeehiveCallAnswer" + user.id).listen(
        "BeehiveCallAnswer",
        function (CallAnswer) {
            CompleteCalling(CallAnswer)
        }
    );
}
