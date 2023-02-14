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
export function AcceptFriend(id) {
    return instance.post("users/accept-friend", { id: id });
}
