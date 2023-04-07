import instance from "./config";

export function GetUserProfile(id) {
    return instance.get("users/get-user-profile?id=" + id);
}
export function AddFriend(data) {
    return instance.post("users/add-friend", data);
}
export function ListFriend(id) {
    return instance.get("users/list-friend?id=" + id);
}
export function NewFriend(id) {
    return instance.get("users/new-friend?id=" + id);
}
export function AcceptFriend(id) {
    return instance.post("users/accept-friend", { id: id });
}
export function CancelAddFriend(id) {
    return instance.post("users/cancel-add-friend", { id: id });
}



export function CallOffer(data) {
    return instance.post("users/call-offer", data);
}
export function CallAnswer(data) {
    return instance.post("users/call-answer", data);
}

