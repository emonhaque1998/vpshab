import LiveChat from "./LiveChat";


const liveChat = new LiveChat();

if(liveChat.liveChatBtn){
    liveChat.liveChatBtn.addEventListener("click", (e) => {
        e.preventDefault();
        liveChat.openLiveChat();
    })
}
