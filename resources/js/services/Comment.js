import instance from "./config";

export function UpdateComment(data) {
    return instance.post("comment/add-comment", data);
}
