import instance from "./config";

export function GetTypeNotifi() {
    return instance.get("/notification/GetTypeNotifi");
}
export function AddFriend(data) {
    return instance.post("/notification/add-friend", data);
}
export function CheckNotifiUnread(id) {
    return instance.get("/notification/CheckNotifiUnread?id=" + id);
}
