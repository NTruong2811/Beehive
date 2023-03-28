import instance from "./config";

export function GetComment(id, page) {
    return instance.get("comment/get-comment?id=" + id + "&page=" + page);
}

export function UpdateComment(data) {
    return instance.post("comment/add-comment", data);
}

export function AddReply(data) {
    return instance.post("comment/add-reply", data);
}
