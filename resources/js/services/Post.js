import instance from "./config";

export function GetTypePost() {
    return instance.get("/post/get-type-post");
}
export function UpdatePost(data) {
    return instance.post("/post/update-post", data, {
        headers: {
            "Content-Type": "multipart/form-data",
        },
    });
}
export function GetPostDetail(id) {
    return instance.get("/post/get-post-detail?id=" + id);
}


export function UpdateLike(data) {
    return instance.post("/post/update-like", data);
}



export function CC(id) {
    return id;
}

