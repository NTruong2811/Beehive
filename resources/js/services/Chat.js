import instance from "./config";
export function GetChatDetail(id) {
    return instance.get("chat/get-chat-detail?id=" + id);
}
export function SendMessage(data) {
    return instance.post("chat/send-message",data);
}